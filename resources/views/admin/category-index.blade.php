@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12 mb-3 text-end">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Category List</h4>
                </div>

                <div class="card-body">
                    @if ($categories->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-success me-1">Edit</a>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <h5 class="mb-0">Data not found in category table!</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection