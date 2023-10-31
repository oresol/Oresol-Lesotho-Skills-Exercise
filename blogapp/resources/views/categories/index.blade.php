@extends('layouts.app')

@section('content')
    <div class="container">
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

            </tbody>
        </table>
    </div>
@endsection
