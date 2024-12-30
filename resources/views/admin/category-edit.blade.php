@extends('admin.layout')
@section('main')
    <div class="container">
        <div class="row">
           <div class="card">
                <div class="card-header">Update Category</div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Category Name</label>
                            <input type="text" name="category_name" placeholder="Enter category name" value="{{ $category->category_name, old('category_name') }}">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
@endsection