@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Permissions</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.permission') }}" class="btn btn-primary">Add Permission</a>
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
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $item)
                                                <button type="button" class="btn btn-dark">
                                                    {{ $item->name }}
                                                </button>
                                            @endforeach
                                        </td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.role.permission', ['id' => $role->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.permission', ['id' => $role->id]) }}">Delete</a>
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
