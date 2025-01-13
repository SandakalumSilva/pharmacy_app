@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Suppliers</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.supplier') }}" class="btn btn-primary">Add Supplier</a>
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
                                    <th>Supplier Name</th>
                                    <th>Supplier Email</th>
                                    <th>Supplier Phone</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($allSuppliers as $key => $supplier)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->email == null ? '----' : $supplier->email }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->description == null ? '----' : $supplier->description }}</td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.supplier', ['id' => $supplier->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.supplier', ['id' => $supplier->id]) }}">Delete</a>
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
