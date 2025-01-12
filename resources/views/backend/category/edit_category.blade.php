@extends('index')
@section('content')
    <div class="section-header">
        <h1>Add New Category</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('update.category') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <input value="{{ $category->id }}" hidden name="id" />
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" value="{{ $category->name }}" name="categoryName"
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
