@extends('layouts.public_navbar')


@section('content')
<!DOCTYPE html>
<html>
<head>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container text-center">
  <h1>Explore Published Articles</h1>
</div>
<div class="container">

<div class="card-deck row">

  <div class="col-xs-12 col-sm-6 col-md-4">
  <div class="card">
    <div class="view overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
    <div class="card-body">
      <h4 class="card-title">1 Card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <button type="button" class="btn btn-primary btn-md">Read more</button>

    </div>

  </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-4">
  <div class="card mb-4">
    <div class="view overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/14.jpg" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
    <div class="card-body">

      <h4 class="card-title">2 Card title</h4>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <button type="button" class="btn btn-primary btn-md">Read more</button>

    </div>

  </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
  <div class="card mb-4">
    <div class="view overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/15.jpg" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">3 Card title</h4>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

      <button type="button" class="btn btn-primary btn-md">Read more</button>

    </div>

  </div>
</div> 
</div>
</div>

<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection