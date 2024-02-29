<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Include any other CSS files or meta tags here -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Library</a>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS and any other JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include any other JavaScript files here -->
</body>
</html>
