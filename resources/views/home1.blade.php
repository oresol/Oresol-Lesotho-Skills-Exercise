@extends('layouts.layout')

@section('content')

<div class="container" style="padding-top:10px; margin-bottom:15px;">
    <a href="/create" class="btn btn-primary">Create Post</a>
</div>
<div class="container" style="padding-bottom: 120px;">
<table class="table align-middle mb-50 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Title</th>
      <th>Descrpition</th>
      <th>Category</th>
      <th>Tags</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <!-- // -->
    <tr>
      <td>
        <div class="d-flex align-items-center">
          
          <div class="ms-3">
            <p class="fw-bold mb-1"></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">The type of lens this camera has 10x zoom capability and has a fash shutter speed making memories even more clearer</p>
      </td>
      <td>
      <p class="fw-normal mb-1 text-muted">Tech</p>
      </td>
      <td> <span class="badge rounded-pill bg-secondary m-1">#tech</span>
      <span class="badge rounded-pill bg-secondary">#camera</span>
        </td>
      <td>
        <button type="button" class="btn btn-primary m-1">
          Edit
        </button>
        <button type="button" class="btn btn-success m-1">
          View
        </button>
        <button type="button" class="btn btn-danger m-1">
          Delete
        </button>
      </td>
    </tr>


    
  </tbody>
</table>
</div>

@endsection