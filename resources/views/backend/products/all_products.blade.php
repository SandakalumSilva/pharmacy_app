@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Products</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.product') }}" class="btn btn-primary">Add Product</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Selling Price</th>
                                    <th>Qty</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($allProducts as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product['category']['name'] }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.product', ['id' => $product->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.product', ['id' => $product->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
