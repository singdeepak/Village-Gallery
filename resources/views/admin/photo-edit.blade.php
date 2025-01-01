@php
    $categories = App\Models\Category::latest()->get();
@endphp

@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">Update Photos</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('photo.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ $cat->id == $photo->category_id ? 'selected' : '' }}>
                                        {{ $cat->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <img src="{{ asset('storage/'.$photo->photo) }}" alt="image" style="width:100px;, height:100px;">
                        </div>
                        <div class="form-group mb-3">
                            <input type="file" name="photo_name" class="form-control">
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