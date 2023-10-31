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
        @if(session('message'))
            <div class="alert alert-danger">
              {{ session('message') }}
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
          <form method="POST" action="{{ route('publishArticle') }}">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="author_name">Author Name</label>
                <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Enter Author Name" required>
            </div>

            <div class="form-group">
                <label for="article_title">Article Title</label>
                <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Enter the article title" required>
            </div>

            <div class="form-group">
                <label for="article_image">Upload Image</label>
                <input type="file" class="form-control-file" id="article_image" name="article_image">
            </div>

            <div class="form-group">
                <label for="category">Category Name</label>
                <select class="form-control" id="category" name="category">
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="article_body">Article Body</label>
                <textarea class="form-control" id="article_story" name="article_body" rows="15" placeholder="Write the entire article here" required></textarea>
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

