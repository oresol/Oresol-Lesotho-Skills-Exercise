<!DOCTYPE html>
<html>
<head>
    <title>Sidebar Menu Example</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS here, if needed -->
    <style>
        /* Add your custom CSS for styling the sidebar here */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px;
            padding: 15px;
            text-align: center; /* Center-align the content */
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="publish_article">Write Article</a>
        <a href="#">Published Articles</a>
        <a href="#">Services</a>
    </div>

    @yield('content')

    <!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
