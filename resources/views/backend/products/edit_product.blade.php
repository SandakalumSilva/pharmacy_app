@extends('index')
@section('content')
    <div class="section-header">
        <h1>Add New Product</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('update.product') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Add Product</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" value="{{ $product->id }}" type="hidden">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="productName" value="{{ $product->name }}"
                                    placeholder="Product Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" name="category">
                                    <option disabled selected>Select Category</option>
                                    @foreach ($allCategory as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input type="number" name="price" value="{{ $product->selling_price }}"
                                    placeholder="00.00" class="form-control">
                            </div>
                            <div class="form-group mb-0">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="description">{{ $product->description }}</textarea>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
