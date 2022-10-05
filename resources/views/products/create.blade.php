@extends ('layouts.app') 
@section ('content')
<div class="container">
      <h1>New Product</h1>

    {{-- Form to cater for adding of users tasks --}}
  {!! Form::open(['action'=> 'ProductsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  <div class="form-row">
        <div class="form-group col-md-6">
            {{Form::label('name','Name')}} 
            {{Form::text('name', '', ['class'=>'form-control','required'])}}
        </div>  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        {{Form::label('price','Price')}} 
        {{Form::text('price', '', ['class'=>'form-control','required'])}}
    </div>  
</div>

  <div class="form-row">
    <div class="form-group col-md-6" >
        {{ Form::select('type', [
                    'single' => 'Single',
                    'variable' => 'Variable',
                
                ], null, ['placeholder' => 'Select type', 'class' => 'form-control','required']) }}
    </div>
</div>

  <div class="form-row">
    <div class="form-group col-md-6">
        {{Form::label('sku','SKU(Stock Keeping Unit)')}} 
        {!! Form::text('sku', '', ['class' => 'form-control', 'placeholder'=>'Leave Blank to be system generated' ]); !!}

    </div>  
</div>



  {{Form::submit('Save', ['class'=>'btn btn-primary'])}}{!! Form::close() !!}
  
</div>
@endsection
 


