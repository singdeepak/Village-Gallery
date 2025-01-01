@php
    $categories = App\Models\Category::latest()->get();
@endphp

@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Create Photo</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <select name="category" class="form-control">
                                <option disabled selected>Choose Category</option>
                                @foreach ($categories  as $category)    
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Upload Photo</label>
                            <input type="file" name="photo_name" class="form-control">
                        </div>
                        <div class="text-end">
                            <input type="submit" value="Create" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection