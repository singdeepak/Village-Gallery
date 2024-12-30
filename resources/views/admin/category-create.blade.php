@extends('admin.layout')
@section('main')
    <div class="container">
        <div class="row">
           <div class="card">
                <div class="card-header">Create Category</div>
                <div class="card-body">
                    <form action="{{ route('category.index') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="mb-3">Category Name</label>
                            <input type="text" name="category_name" placeholder="Enter category name" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Create" class="btn btn-primary">
                        </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
@endsection