@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card col-6 offset-3">
            <h5 class="card-header">Add Post Category</h5>
            <div class="card-body">
                @include('messages')
                <form action="/category" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Catergory Name</label>
                        <input type="text" name="category_name" placeholder="Category"
                            class="form-control @error('category_name') is-invalid @enderror"
                            value="{{ old('category_name') }}">
                        @error('category_name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add Catergory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card col-6 p-4 mt-3 offset-3">
        @include('messages')
        <table class="table justify-content-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @if (!empty($categories) && $categories->count())
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">
                            {{ $category->id }}
                        </th>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <form action="/category/{{ $category->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="/category/{{ $category->id }}" class=" btn btn-success">View</a>
                                <a href="/category/{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                                <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-2 fw-bold text-center">No  Categories</h5>
                        </div>
                    </div>
                </div>
                @endif
            </tbody>
        </table>
         {!! $categories->links()!!}
    </div>
</div>
@endsection
