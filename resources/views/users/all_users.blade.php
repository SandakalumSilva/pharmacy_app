@extends('index')
@section('content')
    <div class="section-header">
        <h1>All Users</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('add.user') }}" class="btn btn-primary">Add Users</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($allUsers as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><img id="showImg"
                                                src="{{ $user->image ? url($user->image) : url('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;"
                                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"> </td>
                                        <td>{{ $user->email }}
                                        </td>
                                        <td> <a class="btn btn-warning"
                                                href="{{ route('edit.user', ['id' => $user->id]) }}">Update</a>
                                            <a class="btn btn-danger" id="delete"
                                                href="{{ route('delete.user', ['id' => $user->id]) }}">Delete</a>
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
