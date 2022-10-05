@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/products" class="btn btn-dark">Go Back</a>
      <h1>{{$product->name}}</h1>
      <div class="card"> 
        <div class="row">
           <aside class="col-sm-7">
            <article class="card-body p-5">
              <dl class="item-property">
                <h2><dt>Product Information</dt></h2>

                <dt>Name</dt>

                <dd>
                  {!!$product->name!!}
                </dd>
                <dt>Type</dt>

                <dd>
                    {!!$product->type!!}
                  </dd>

                  <dt>SKU</dt>
                  <dd>
                    {!!$product->SKU!!}
                  </dd>
                 
              </dl>
              <dl class="param param-feature">
                <dt>Created On</dt>
                <dd>{{$product->created_at}}</dd>
              </dl>
              
              <hr>
      </div>
      </div>
    
              <!--if user has logged in -->
           
    
              @if(Auth::user()->role_id==1)
                  {!!Form::open(['action'=>['ProductsController@destroy', $product->id], 'method'=>'POST','class'=>'float-right'])!!} 
                  {{Form::hidden('_method', 'DELETE')}} 
                  {{Form::submit('Delete', ['class'=>'btn btn-danger'])}} 
                  {!!Form::close()!!} 
                  
             @endif
    
            </article>
            <!-- card-body.// -->
          </aside>    
      </div>
</div>
@endsection