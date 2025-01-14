@extends('index')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="section-header">
        <h1>Edit Expenses</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('update.expenses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Expenses</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="{{ $expenses->id }}" name="id">
                            <div class="form-group">
                                <label>Expenses</label>
                                <input type="text" value="{{ $expenses->expense }}" name="expenses"
                                    placeholder="Add Expenses Here." class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Expenses Amount</label>
                                <input type="number" value="{{ $expenses->amount }}" name="amount" placeholder="00.00"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Expenses Date</label>
                                <input type="text" name="expensesDate" value="{{ $expenses->date }}"
                                    class="form-control datepicker">
                            </div>
                            <div class="form-group mb-0">
                                <label>Expenses Description</label>
                                <textarea class="form-control" name="description">{{ $expenses->description }}</textarea>
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
