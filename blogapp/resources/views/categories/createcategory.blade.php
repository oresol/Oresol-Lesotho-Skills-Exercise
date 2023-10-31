@extends('layouts.app')

@section('content')
    <div class="container">
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
@endsection
