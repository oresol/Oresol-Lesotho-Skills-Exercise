@extends('layouts.layout')

@section('content')

<div class="container" style="margin:60px;">
<form
        action="create" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Post title" name="title">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Say something about your post" rows="3" name="description"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Category</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add Category" name="category">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tags</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tags go here" name="tags">
  </div>

  <div class="container" style="padding-top:10px; margin-bottom:15px;">
    <button type="submit"  class="btn btn-primary">Create Post</button>
</div>
</form>
</div>


@stop