@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="align-content: center">
                   
                    @if(Auth::user()->role_id== 1)
                            @if(count($records)>0)
                            <div class="container-fluid" id="old_table">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Contacts</h4>
                                                    <div class="box box-block " >
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover table-2" id="user_tasks">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Address</th>
                                                                        <th>View More</th>
                                                                    </tr>
                                                                </thead>
                                                        
                                                                @foreach($records as $record)
                                                                <tr>
                                                                <td>{{$record->name}}</td>
                                                                <td>{{$record->email}}</td>
                                                                <td>{{$record->address}}</td>
                                                                <td><a href="/contact/{{$record->id}}" class="btn btn-primary">More Details</a></td>

                                    
                                                                </tr>
                                                            
                                                                @endforeach
                        
                                                            <tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{ __('You can view your Suppliers by clicking the button below!') }}
                                <br>
                            <a class="btn btn-primary"
                                href="/contact"
                                role="button">
                                View More Suppliers
                            </a>

                            @else
                            
                            {{ __('You can create your contacts by clicking the button below!') }}
                                <br>
                            <a class="btn btn-primary"
                            href="/contact/create"
                            role="button">
                            Create
                        </a>
                            @endif

                    @else
                    @if(count($products)>0)
                            <div class="container-fluid" id="old_table">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Products</h4>
                                                    <div class="box box-block " >
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover table-2" id="user_tasks">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>SKU</th>
                                                                        <th>Type</th>
                                                                        <th>View More</th>
                                                                    </tr>
                                                                </thead>
                                                        
                                                                @foreach($products as $product)
                                                                <tr>
                                                                <td>{{$product->name}}</td>
                                                                <td>{{$product->SKU}}</td>
                                                                <td>{{$product->type}}</td>
                                                                <td><a href="/products/{{$product->id}}" class="btn btn-primary">More Details</a></td>

                                                                </tr>
                                                            
                                                                @endforeach
                        
                                                            <tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{ __('You can view your Suppliers by clicking the button below!') }}
                                <br>
                            <a class="btn btn-primary"
                                href="/products"
                                role="button">
                                View More Products
                            </a>

                       
                            
                        
                            @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

