@extends('index')
@section('content')
    <style>
        .table_scroll {
            height: 400px;
            overflow-y: scroll;
        }
    </style>
    <div class="section-header">
        <h1>POS</h1>

    </div>
    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card p-0 table_scroll">
                    <h3 class="m-3">Purchase Products</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Item Price</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $totalAmount = 0;
                            @endphp
                            @foreach ($allSell as $key => $sell)
                                @php
                                    $totalAmount += $sell['product']['selling_price'] * $sell->qty;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sell['product']['name'] }}</td>
                                    <td>{{ $sell->qty }}</td>
                                    <td>{{ number_format($sell['product']['selling_price'], 2) }}</td>
                                    <td>{{ number_format($sell['product']['selling_price'] * $sell->qty, 2) }}</td>
                                    <td><a href="{{ route('delete.cart', ['id' => $sell->id]) }}" id="delete"
                                            class="btn btn-danger">Remove</a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">
                                    <h6>Total Amount</h6>
                                </td>
                                <td></td>
                                <td></td>
                                <td><b>{{ number_format($totalAmount, 2) }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card p-0 table_scroll">
                    <h3 class="m-3">All Products</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-md " id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Buy</th>
                                </tr>
                            </thead>
                            @foreach ($allProducts as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product['product']['name'] }}</td>
                                    <td>{{ $product['product']['qty'] }}</td>
                                    <td>{{ number_format($product['product']['selling_price'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('add.cart', $product['product']['id']) }}" method="POST">
                                            @csrf
                                            <input type="number" min="1" value="1" style="width: 20%;"
                                                name="buyQty">
                                            <button class="btn btn-warning m-2" type="submit">Buy</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('purchase') }}" method="POST">
                        @csrf
                        <div class="row m-1">
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Sub Total</label>
                                    <input type="number" value="{{ number_format($totalAmount, 2) }}" id="subTotal"
                                        name="subTotal" readonly class="form-control">
                                </div>
                            </div>

                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="number" min="1" placeholder="00.00" value="{{ old('payAmount') }}"
                                        id="discount" name="discount" class="form-control">
                                </div>
                            </div>

                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="number" placeholder="00.00" value="{{ number_format($totalAmount, 2) }}"
                                        id="total" readonly name="total" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select class="form-control select2" name="paymentMethod">
                                        <option value="1">Cash</option>
                                        <option value="2">Debit/Credit Card</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Pay Amount</label>
                                    <input type="number" placeholder="00.00" value="{{ old('payAmount') }}" id="payAmount"
                                        name="payAmount" class="form-control">
                                </div>
                            </div>

                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Balance</label>
                                    <input type="number" placeholder="00.00" value="00.00" id="balance" readonly
                                        name="balance" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary m-2" id="payButton" type="submit" disabled>Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#discount').keyup(function(e) {
            let discount = $('#discount').val();
            let subTotal = $('#subTotal').val();
            let total = subTotal - ((subTotal * discount) / 100);
            $('#total').val(total);
        });

        $('#payAmount').keyup(function(event) {
            let total = $('#total').val();
            let payAmount = $('#payAmount').val();
            let balance = payAmount - total;
            $('#balance').val(balance.toFixed(2));
            if (balance >= 0 && total != 0) {
                $('#payButton').attr('disabled', false);
            }
        });
    </script>
@endsection
