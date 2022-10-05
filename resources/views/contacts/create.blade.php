@extends ('layouts.app') 
@section ('content')
<div class="container">
      <h1>New Contact</h1>

    {{-- Form to cater for adding of users tasks --}}
  {!! Form::open(['action'=> 'ContactsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  <div class="form-row">
        <div class="form-group col-md-6">
            {{Form::label('name','Name')}} 
            {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'john Doe','required'])}}
        </div>  
  </div>

  <div class="form-row">
    <div class="form-group col-md-6" >
        {{ Form::select('type', [
                    'supplier' => 'Supplier',
                    'merchant' => 'Merchant',
                
                ], null, ['placeholder' => 'Select type', 'class' => 'form-control','required']) }}
    </div>
</div>

  <div class="form-row">
    <div class="form-group col-md-6">
        {{Form::label('email','Email')}} 
        {!! Form::text('email', '', ['class' => 'form-control', 'placeholder'=>'janedoe@gmail.com','required' ]); !!}

    </div>  
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {{Form::label('address','Address')}} 
        {!! Form::text('address', '', ['class' => 'form-control', 'placeholder'=>'tokyo',  'required' ]); !!}

    </div>  
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {{Form::label('msisdn','Phone Number')}} 
        {!! Form::text('msisdn', '', ['class' => 'form-control', 'placeholder'=>'0123445852',  'required' ]); !!}

    </div>  
</div>

  {{Form::submit('Save', ['class'=>'btn btn-primary'])}}{!! Form::close() !!}
  
</div>
@endsection
 


