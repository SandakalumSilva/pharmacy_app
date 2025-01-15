@extends('index')
@section('content')
    <div class="section-header">
        <h1>Change Password</h1>
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
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group col-md-12 col-12">
                                <label>Current Password</label>
                                <input type="password" class="form-control" name="currentPassword">
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Change
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
