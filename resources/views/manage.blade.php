@extends('layouts.default')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card my-2" style="max-height: 40rem; overflow:auto">
                <div class="card-body">
                    <h3 class="card-title fw-bold py-4">Tags:</h3>

                    @if(count($tags) == 0)
                        <h3 class="card-title fw-bold py-4 text-center">No tags to display</h3>
                    @endif

                    <form method="POST" action="{{url('/create-tag')}}" class="d-flex justify-content-between my-3" >
                        @csrf
                        <div style="width: 83%">
                          <input class="@error('tagdesc') is-invalid @enderror  form-control" placeholder="Create new tag" name="tagdesc" type="text">
                        </div>
                        <div class="align-middle">
                          <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>

                    @error('tagdesc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <ul class="list-group">
                        @foreach ($tags as $tag)
                            <li class="list-group-item">
                                <form id="{{$tag->tagdesc.'fm'}}" class="w-100 my-2" style="display: none" action="{{route('edittag', $tag->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group d-flex justify-content-between">
                                        <div style="width: 80%">
                                            <input value="{{$tag->tagdesc}}" type="text" name="tagdesc" class="form-control" id="title" required>
                                        </div>
                                        <button style="width: 4.5rem;" type="submit" class="float-right btn btn-success">Save</button>
                                    </div>
                                </form>

                                <div id="{{$tag->tagdesc}}" class="d-flex justify-content-between">
                                    <span>{{$tag->tagdesc}}</span> 
                                    <span> 
                                        <a onclick="editTag({{$tag->tagdesc}})" style="width: 4.5rem;" class="btn btn-info">Edit</a>
                                        <form style="width: 4.5rem" class="d-inline-block" action="{{route('deletetag', $tag->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button style="width: 4.5rem;" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </span>
                                </div>
                            </li>
                        @endforeach 
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card my-2" style="max-height: 40rem; overflow:auto">
                <div class="card-body">
                    <h3 class="card-title fw-bold py-4">Categories:</h3>

                    @if(count($categories) == 0)
                        <h3 class="card-title fw-bold py-4 text-center">No categories to display</h3>
                    @endif

                    <form method="POST" action="{{url('/create-category')}}" class="d-flex justify-content-between my-3" >
                        @csrf
                        <div style="width: 83%">
                          <input class="@error('catdesc') is-invalid @enderror form-control" placeholder="Create new category" name="catdesc" type="text">
                        </div>
                        <div class="align-middle">
                          <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                    @error('catdesc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <form id="{{$category->catdesc.'fm'}}" class="w-100 my-2" style="display: none" action="{{route('editcategory', $category->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group d-flex justify-content-between">
                                        <div style="width: 80%">
                                            <input value="{{$category->catdesc}}" type="text" name="catdesc" class="@error('catdesc') is-invalid @enderror form-control">
                                        </div>
                                        <button style="width: 4.5rem;" type="submit" class="float-right btn btn-success">Save</button>
                                    </div>
                                </form>


                                <div id="{{$category->catdesc}}" class="d-flex justify-content-between">
                                    <span>{{$category->catdesc}}</span> 
                                    <span> 
                                        <a onclick="editCategory({{$category->catdesc}})" style="width: 4.5rem;" class="btn btn-info">Edit</a>
                                        <form style="width: 4.5rem" class="d-inline-block" action="{{route('deletecategory', $category->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button style="width: 4.5rem;" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </span>
                                </div>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('js/manage.js') }}"></script>
@endsection