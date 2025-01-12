@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Category</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($allCategory as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.category', ['id' => $category->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.category', ['id' => $category->id]) }}">Delete</a>
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
