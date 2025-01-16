@extends('index')
@section('content')
    <div class="section-header">
        <h1>POS</h1>

    </div>
    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card p-0 ">
                    <h3 class="m-3">All Sales</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice No</th>
                                    <th>Payment Method</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $totalAmount = 0;
                            @endphp
                            @foreach ($allSell as $key => $sell)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sell->inv_no }}</td>
                                    <td>{{ $sell->payment_method = 1 ? 'Cash' : 'Card' }}</td>
                                    <td>{{ number_format($sell->sub_total, 2) }}</td>
                                    <td>{{ number_format($sell->discount ? $sell->discount : 0) }}</td>
                                    <td>{{ number_format($sell->total, 2) }}</td>
                                    <td>
                                        <a href="{{ route('invoice.print', ['id' => $sell->id]) }}"
                                            class="btn btn-primary m-2">View</a>
                                        <a href="{{ route('delete.invoice', ['id' => $sell->id]) }}" id="delete"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
