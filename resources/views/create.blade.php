@extends('layouts.default')


@section('content')


<div class="container">

    @if(Session::has('success'))
        @include('propmessage')
    @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card my-2">
                    <div class="card-body">
                        <h3 class="card-title fw-bold py-4">Create new article:</h3>
                        <form class="w-full" action="{{url('/add-article')}}" method="POST">
                            @csrf
                            <div class="form-group my-3">
                                    <label for="title" class="fw-bold">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror " type="text" placeholder="Enter article title" name="title" class="form-control">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group my-3">
                                <label for="fullText" class="fw-bold">Message</label>
                                <textarea type="text" rows="3" name="fullText" class="@error('fullText') is-invalid @enderror form-control" id="fullText" ></textarea>
                            </div>
                            @error('fullText')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group my-3">
                                <label for="catdesc" class="fw-bold">Category:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input value="" type="text" placeholder="Enter new category" name="catdesc" class="@error('catname') is-invalid @enderror form-control" id="newcategory">
                                        @error('catname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4 mt-2">
                                                Select existing Category
                                            </div>
                                            <div class="col-md-8 ">
                                                <select value= "" class="form-control" name="category" id="category">
                                                    <option value="">Choose here</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->catdesc}}">{{$category->catdesc}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-3">
                                <label for="tagdesc" class="fw-bold">Tags:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Enter new tags, comma seperated " name="tagdesc" class="form-control @error('tagdesc') is-invalid @enderror" id="newtag">
                                        @error('tagdesc')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4 mt-2">
                                                Select existing tags
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select value="" class="form-control" name="tag" id="tag">
                                                    <option value="">Choose here</option>
                                                    @foreach ($tags as $tag)
                                                        <option value="{{$tag->tagdesc}}">{{$tag->tagdesc}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
        <script src="{{ asset('js/create.js') }}"></script>
    @endsection