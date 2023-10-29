@extends('layouts.public_navbar')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Login
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-primary">Login</button>
          </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection