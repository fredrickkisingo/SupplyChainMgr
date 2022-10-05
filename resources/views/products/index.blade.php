@extends ('layouts.app') 
@section ('content')

<div class="container-fluid" id="new_table">
</div>
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
                                                <th>Price</th>

                                                <th>Type</th>
                                              <th>Action</th>

                                            </tr>
                                        </thead>
                                
                                        @foreach($products as $product)
                                        <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->SKU}}</td>
                                        <td>{{$product->price}}</td>
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
@endsection