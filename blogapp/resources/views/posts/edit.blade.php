@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card col-6 offset-3">
            <h5 class="card-header text-center fs-1">Edit Article</h5>
            <div class="card-body">
                @include('messages')
                <form action="/articles/{{ $article->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tittle</label>
                        <input type="text" name="title"
                            class="form-control @error('title') is-invalid @enderror"id="exampleFormControlInput1"
                            placeholder="" value={{ $article->title }}>
                        @error('title')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="text" name="user_id"
                        class="form-control invisible @error('user_id') is-invalid @enderror"
                        value="{{ auth()->user()->id }}" id="exampleFormControlInput1" placeholder="title">
                    <div class="mb-3">
                        <select class="form-select" name="category_id" aria-label="Select Category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" value={{ $article->content }}
                            id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('content')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Edit Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
