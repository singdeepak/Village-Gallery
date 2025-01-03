@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">Update Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="category_name" placeholder="Enter category name" value="{{ old('category_name', $category->category_name) }}" class="form-control">
                        </div>

                        <div class="text-end">
                            <input type="submit" value="Update" class="btn btn-warning">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection