@extends('index')
@section('content')
    <div class="section-header">
        <h1>Edit Permission</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('permission.update') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Permission</h4>
                        </div>
                        <input type="hidden" name="id" value="{{ $permission->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Permission Name</label>
                                <input type="text" value="{{ $permission->name }}" name="name"
                                    placeholder="Permission Name" class="form-control">
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
