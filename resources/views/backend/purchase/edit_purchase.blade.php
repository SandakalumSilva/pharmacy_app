@extends('index')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="section-header">
        <h1>Edit Purchase</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('update.purchase') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Purchase</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="{{ $purchase->id }}" name="id">
                            <div class="form-group">
                                <label>Product</label>
                                <select class="form-control select2" name="productId">
                                    <option disabled selected>Select Product</option>
                                    @foreach ($products as $product)
                                        <option
                                            value="{{ $product->id }}"{{ $purchase->product_id == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control select2" name="suppliertId">
                                    <option disabled selected>Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Cost</label>
                                <input type="number" value="{{ $purchase->cost_price }}" name="productCost"
                                    placeholder="00.00" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="number" name="qty" value="{{ $purchase->qty }}" placeholder="10"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Purchase Date</label>
                                <input type="text" name="purchaseDate" value="{{ $purchase->pur_date }}"
                                    class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label>Expire Date</label>
                                <input type="text" name="expireDate" value="{{ $purchase->exp_date }}"
                                    class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" id="image" placeholder="" class="form-control"
                                    accept="image/*">
                            </div>
                            <div class="form-group">
                                <img id="showImg"
                                    src="{{ $purchase->image ? url($purchase->image) : url('upload/no_image.jpg') }}"
                                    style="width: 100px; height: 100px;" class="rounded-circle avatar-lg img-thumbnail"
                                    alt="profile-image">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
