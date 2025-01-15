@extends('index')
@section('content')
    <div class="section-header">
        <h1>Profile</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ $user->name }}</h2>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{ $user->image ? url($user->image) : url('upload/no_image.jpg') }}"
                            class="rounded-circle profile-widget-picture">

                    </div>
                    <div class="profile-widget-description">
                        <div class="form-group col-md-12 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('edit.user', ['id' => Auth::user()->id]) }}"
                                class="btn btn-warning m-1">Update
                                User</a>
                            <a href="{{ route('change.password', ['id' => Auth::user()->id]) }}" class="btn btn-primary">Change
                                Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
