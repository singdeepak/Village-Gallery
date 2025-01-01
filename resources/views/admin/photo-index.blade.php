@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12 mb-3 text-end">
            <a href="{{ route('photo.create') }}" class="btn btn-primary">Create Photo</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Photo List</h4>
                </div>

                <div class="card-body">
                    @if ($photos->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($photos as $photo)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ 'storage/'.$photo->photo }}" alt="image" style="width:100px;, height:100px;"></td>
                                            <td class="text-center">
                                                <a href="{{ route('photo.edit', $photo->id) }}" class="btn btn-sm btn-success me-1">Edit</a>
                                                <form action="{{ route('photo.destroy', $photo->id) }}" method="POST" class="d-inline-block">
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
                            <h5 class="mb-0">Data not found in Photo table!</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection