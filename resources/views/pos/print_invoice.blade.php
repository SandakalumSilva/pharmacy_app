@extends('index')
@section('content')
    <div class="section-header">
        <h1>POS</h1>

    </div>
    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card p-0">
                    <h3 class="m-3">{{ $sales->inv_no }}</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Item Price</th>
                                    <th>Amount</th>
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
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">

                                </td>
                                <td></td>
                                <td>
                                    <h6>Sub Total</h6>
                                </td>
                                <td><b>{{ number_format($sales->sub_total, 2) }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                </td>
                                <td></td>
                                <td>
                                    <h6>Discount</h6>
                                </td>
                                <td><b>{{ $sales->discount ? $sales->discount : 0 }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                </td>
                                <td></td>
                                <td>
                                    <h6>Sub Total</h6>
                                </td>
                                <td><b>{{ $sales->total }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                @if ($sales->deleted_at == null)
                    <div class="card-footer text-right">
                        <a href="{{ route('pos') }}" class="btn btn-warning m-2">POS</a>
                        <a class="btn btn-primary m-2" target="_blank" id="print"
                            href="{{ route('invoice.generate', ['id' => $sales->id]) }}">Print</a>
                    </div>
                @endif

            </div>
        </div>

    </div>
@endsection
