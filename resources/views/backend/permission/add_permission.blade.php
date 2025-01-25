@extends('index')
@section('content')
    <div class="section-header">
        <h1>Add New Permission</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                    <form action="{{ route('permisssion.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Add Permission</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Permission Category</label>
                                <select class="form-control select2" name="category">
                                    <option disabled selected>Select Permission Category</option>
                                    @foreach ($permissionCategory as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Permission Name</label>
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Permission Name" class="form-control">
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
