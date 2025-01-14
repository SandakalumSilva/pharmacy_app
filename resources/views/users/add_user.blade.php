@extends('index')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="section-header">
        <h1>Add New User</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Add User</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" placeholder="John Doe"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    placeholder="samole@email.com" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" id="image" placeholder="" class="form-control"
                                    accept="image/*">
                            </div>
                            <div class="form-group">
                                <img id="showImg" src="{{ url('upload/no_image.jpg') }}"
                                    style="width: 100px; height: 100px;" class="rounded-circle avatar-lg img-thumbnail"
                                    alt="profile-image">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
