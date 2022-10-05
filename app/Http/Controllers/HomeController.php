<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //role id 3 is for the merchant who has been created by the user registered using the siggnup form while 1 is for an admin
        $user_id=Auth::user()->id;

        if(Auth::user()->role_id !== 3){
                    $records = DB::table('contacts')
                    ->select(
                            'contacts.id as id',
                            'contacts.name as name',
                            'contacts.address as address',
                            'contacts.email as email',
                    
                    )
                    ->where('contacts.type','supplier')
                    ->orderBy('contacts.created_at','desc')->paginate(5);

                    return view('home')->with(compact('records'));


                     }else if(Auth::user()->role_id == 3){
                        $products= Product::orderBy('created_at','desc')->get();
                        return view('home')->with(compact('products'));

                    }

    }
}
