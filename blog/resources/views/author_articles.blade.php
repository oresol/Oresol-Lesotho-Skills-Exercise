<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Article</title>

    <!-- Add the Bootstrap CSS library from a CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optionally, you can include your custom CSS here -->
    <link rel="stylesheet" href="your-custom-styles.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $article->article_title }}</h1>
            <p class="text-center">Author: {{ $article->author_name }}</p>
            <p>{{ $article->article_body }}</p>
            <p class="text-right">Date Published: {{ $article->created_at }}</p>
        </div>
    </div>
</div>

<!-- Add the Bootstrap JavaScript and jQuery libraries from a CDN (for Bootstrap features like modals, tooltips, etc.) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
