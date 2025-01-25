@extends('index')
@section('content')
    <div class="section-header">
        <h1>Edit Role</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('roles.update') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Role</h4>
                        </div>
                        <input type="hidden" value="{{ $role->id }}" name="id">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" value="{{ $role->name }}" name="name" placeholder="Role Name"
                                    class="form-control">
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
