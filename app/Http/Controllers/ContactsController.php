<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Temporary;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        if(Auth::check()){

            if(Auth::user()->role_id !== 3){
        $records = DB::table('contacts')
            ->select(
                'contacts.id as id',
                'contacts.name as name',
                'contacts.address as address',
                'contacts.email as email',
                'contacts.type as type'


            )
            ->orderBy('contacts.created_at', 'desc')->get();


          return view('contacts.index')->with('records', $records);
            }elseif(Auth::user()->role_id == 3){

                return redirect()->back()->with('error','Unauthorised');

            }
            }else{
                return redirect('login')->with('error','Unauthorised');

            }
    }

    public function viewSuppliers()
    {
   

        if(Auth::check()){

            if(Auth::user()->role_id !== 3){
                $records = DB::table('contacts')
                    ->select(
                    'contacts.id as id',
                    'contacts.name as name',
                    'contacts.address as address',
                    'contacts.email as email',
                    'contacts.type as type'


                )->where('type','supplier')
                ->orderBy('contacts.created_at', 'desc')->get();


                return view('contacts.supplier_index')->with('records', $records);
            }elseif(Auth::user()->role_id == 3){

                return redirect()->back()->with('error','Unauthorised');

            }
            }else{
                return redirect('login')->with('error','Unauthorised');

            }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role_id == 3){

            return redirect()->back()->with('error','Unauthorised');

        }else{

            return view('contacts.create');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //function to store a new contact either a supplieer or a customer

        $this->validate($request,[
            'email'=>'required |unique:users'
        ]);

        try {
        $new_contact  = new Contact();
        $new_contact->name=$request->input('name');
        $new_contact->address=$request->input('address');
        $new_contact->type=$request->input('type');
        $new_contact->email=$request->input('email');
        $new_contact->msisdn=$request->input('msisdn');
        $new_contact->save();

        //if it is a merchant create  a user and generate a random password for him/her to be emailed
        if ($new_contact->type =='merchant'){
            $password=Str::random(12);

            //here is where the user will be emailed with a temporary password which will  be changed.For demo purposes we will store them in a database so as to demonstrate
            $temporary= new Temporary();
            $temporary->name= $new_contact->name;
            $temporary->temporary_password= $password;
            $temporary->save();

            //so for creating a new merchant we assign them with role id of 3 while  Admin with role id of 1 who will be the registered user for the moment
            $new_user = new User();
            $new_user->email= $new_contact->email;
            $new_user->name= $new_contact->name;
            $new_user->role_id=3;
            $new_user->password= Hash::make($password);
            $new_user->save();
        }

        return  redirect('/contact')->with('success', 'Contact added successfully');


    }catch(\Exception $e){
    
                  Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

                    return  redirect()->back()->with('error', 'something went wrong!Please try again');

    }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        if(Auth::user()->role_id == 3){

            return redirect()->back()->with('error','Unauthorised');

        }else{

        
        $record = Contact::find($id);
        return view('contacts.show')->with('record',$record);

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role_id == 3){

            return redirect()->back()->with('error','Unauthorised');

        }else{

        $contact = Contact::find($id);
        return view('contacts.edit')->with('contact',$contact);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $contact=Contact::find($id);
        if(Auth::check()){

            // dd($request->all());
            $updated = $contact->fill($request->all())->save();

            return redirect('/contact')->with('success','Contact Details Updated !');

        }else{

            return redirect()->back()->with('error','Unauthorised');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::find($id);
        
        $contact->delete();

        return redirect('/contact')->with('success','Contact Deleted Successfully');
           
    }
}
