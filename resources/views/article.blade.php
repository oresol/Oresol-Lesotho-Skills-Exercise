@extends('layouts.default')


@section('content')


<div class="container mt-4 d-flex justify-content-center">
    <div class="card" style="width: 42rem;">
        @if ($article->image != null)
            <img src="{{URL::asset("storage/".$article->image)}}" width="200" height="200" class=" pt-2 mx-auto d-block rounded-circle" alt="...">
        @endif
        <div class="card-body">
          <h2 class="card-title text-center fw-bold py-3">{{$article->title}}</h2>
          <p class="card-text italic">{{$article->fullText}}</p>

          <div class="row border p-3 mb-2">
            <div class="col-md-3 fw-bold">
            Category :
            </div>
            <div class="col-md-3 ">
                <input class="form-control" readonly type="text" value="{{$article->category}}">
            </div>
            <div class="col-md-2 fw-bold">
                Tags :
            </div>
            <div class="col-md-4 ">
                <select class="form-control" name="category">
                    @foreach ($article->tags as $tag)
                        <option>{{$tag}}</option>
                    @endforeach
                </select>
            </div>
        </div>

          <div class="d-flex justify-content-between">
            <form class="d-inline-block me-2" method="GET" action="{{ route ('geteditarticle', $article->id)}}">
                @csrf
                <button style="width: 5rem;" type="submit" class="btn btn-info my-2">Edit</button>
            </form>
            <form class="d-inline-block" onclick="myfunction()" method="POST" action="{{ route ('deletearticle', $article->id)}}">
                @csrf
                @method('DELETE')
                <button style="width: 5rem;" type="submit" class="btn btn-danger my-2">Delete</button>
            </form>
          </div>
        </div>

      </div>
    </div>
@endsection