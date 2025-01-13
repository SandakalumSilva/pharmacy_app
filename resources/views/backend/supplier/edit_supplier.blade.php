@extends('index')
@section('content')
    <div class="section-header">
        <h1>Edit Supplier</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <form action="{{ route('update.supplier') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Supplier</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $supplier->id }}">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" name="name" value="{{ $supplier->name }}"
                                    placeholder="Supplier Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Supplier Email</label>
                                <input type="email" name="email" value="{{ $supplier->email }}"
                                    placeholder="sample@email.com" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Supplier Phone</label>
                                <input type="number" name="phone" value="{{ $supplier->phone }}" placeholder="09******10"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Supplier Address</label>
                                <input type="text" name="address" value="{{ $supplier->address }}"
                                    placeholder="Sample Address" class="form-control">
                            </div>
                            <div class="form-group mb-0">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="description">{{ $supplier->description }}</textarea>
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
