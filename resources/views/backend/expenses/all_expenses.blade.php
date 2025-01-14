@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Expenses</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.expenses') }}" class="btn btn-primary">Add Expenses</a>
        </div>
    </div>
    <div class="section-body">

        <form action="{{ route('expense.search') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-3 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input name="startDate" type="text" class="form-control datepicker">
                    </div>
                </div>
                <div class="col-3 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label>End Date</label>
                        <input name="endDate" type="text" class="form-control datepicker">
                    </div>
                </div>
                <div class="col-3 col-md-3 col-lg-3 m-3">
                    <div class="form-group m-3">
                        <button class="btn btn-primary" type="submit">Search By Product</button>
                    </div>
                </div>
            </div>

        </form>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Expense</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($allexpenses as $key => $expenses)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $expenses->expense }}</td>
                                        <td>{{ $expenses->date }}</td>
                                        <td>{{ $expenses->description ? $expenses->description : 'No Description Added' }}
                                        </td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.expenses', ['id' => $expenses->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.expenses', ['id' => $expenses->id]) }}">Delete</a>
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
