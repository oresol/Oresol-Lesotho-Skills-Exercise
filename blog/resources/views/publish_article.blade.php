@extends('layouts.author_dashboard')

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
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Create an Article
        </div>
        <div class="card-body">
          <form method="POST" action="">
            <div class="form-group">
              <label for="article_title">Article Title</label>
              <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Enter the article title" required>
            </div>

            <div class="form-group">
              <label for="article_story">Article Story</label>
              <textarea class="form-control" id="article_story" name="article_story" rows="15" placeholder="Write the entire article here" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publish Article</button>
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
</body>
</html>

@endsection
