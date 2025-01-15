@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Purchase</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.purchase') }}" class="btn btn-primary">Add Purchase</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Supplier</th>
                                        <th>Qty</th>
                                        <th>Cost Price</th>
                                        <th>Purchase Date</th>
                                        <th>Expire Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($allPurchase as $key => $purchase)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $purchase['product']['name'] }}</td>
                                        <td><img id="showImg"
                                                src="{{ $purchase->image ? url($purchase->image) : url('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;"
                                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"></td>
                                        <td>{{ $purchase['supplier']['name'] }}</td>
                                        <td>{{ $purchase->qty }}</td>
                                        <td>{{ $purchase->cost_price }}</td>
                                        <td>{{ $purchase->pur_date }}</td>
                                        <td>{{ $purchase->exp_date }}</td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.purchase', ['id' => $purchase->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.purchase', ['id' => $purchase->id]) }}">Delete</a>
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
