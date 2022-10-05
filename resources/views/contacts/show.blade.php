@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/contact" class="btn btn-dark">Go Back</a>
      <h1>{{$record->name}}</h1>
      <div class="card"> 
        <div class="row">
           <aside class="col-sm-7">
            <article class="card-body p-5">
              <dl class="item-property">
                <h2><dt>Contact Information</dt></h2>

                <dt>Name</dt>

                <dd>
                  {!!$record->name!!}
                </dd>
                <dt>Email</dt>

                <dd>
                    {!!$record->email!!}
                  </dd>

                  <dt>Address</dt>
                  <dd>
                    {!!$record->address!!}
                  </dd>
                  <dd>
                    {!!$record->type!!}
                  </dd>
              </dl>
              <dl class="param param-feature">
                <dt>Created On</dt>
                <dd>{{$record->created_at}}</dd>
              </dl>
              
              <hr>
      </div>
      </div>
    
              <!--if user has logged in -->
           
    
              {{-- @if(Auth::user()->role_id==1) --}}
                 <a href="/contact/{{$record->id}}/edit" class="btn btn-warning">Edit</a> 
                  {!!Form::open(['action'=>['ContactsController@destroy', $record->id], 'method'=>'POST','class'=>'float-right'])!!} 
                  {{Form::hidden('_method', 'DELETE')}} 
                  {{Form::submit('Delete', ['class'=>'btn btn-danger'])}} 
                  {!!Form::close()!!} 
                  
            {{-- @endif --}}
    
            </article>
            <!-- card-body.// -->
          </aside>    
      </div>
</div>
@endsection