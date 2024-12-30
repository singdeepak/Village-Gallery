@extends('admin.layout')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="row">
           @if ($categories->isNotEmpty())
               <table class="table table-dark">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
               </table>
           @else
               
           @endif
        </div>
    </div>
@endsection