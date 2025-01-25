@extends('index')
@section('content')
    <div class="section-header">
        <h1>Add Role Permissions</h1>

    </div>
    <div class="section-body">

        <div class="row">


            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('role.permission.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select class="form-control select2" name="role_id">
                                        <option selected disabled>Select Roles </option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-check m-1">
                                <input class="form-check-input" type="checkbox" id="allSelect">
                                <label class="form-check-label" for="defaultCheck1">
                                    All Select
                                </label>
                            </div>
                            <hr>
                            @foreach ($allPermissionCategory as $permissionCategory)
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <b>{{ $permissionCategory->name }}</b>
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        @php
                                            $permissions = App\Models\User::getPermissionById($permissionCategory->id);
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permission[]"
                                                    value="{{ $permission->id }}" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <hr>
                        <div class="card-footer text-right col-6">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        $('#allSelect').click(function() {
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked', true);
            } else {
                $('input[type = checkbox]').prop('checked', false);
            }

        });
    </script>
@endsection
