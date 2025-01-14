@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Stock</h1>

    </div>
    <div class="section-body">

        <form action="{{ route('stock.search') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Product</label>
                        <select class="form-control select2" name="productId">
                            <option disabled selected>Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"{{ old('productId') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-4 m-3">
                    <div class="form-group m-3">
                        <button class="btn btn-primary" type="submit">Search By Product</button>
                    </div>
                </div>
            </div>

        </form>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Available Quantity</th>
                                </tr>
                                @foreach ($allStock as $key => $stock)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $stock['product']['name'] }}</td>
                                        <td>{{ $stock->purchase_stock }}</td>
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
