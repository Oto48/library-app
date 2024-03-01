<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="container navbar navbar-expand navbar-light bg-light px-2">
        <a class="btn btn-success" href="/">Library</a>
        <a href="{{ route('books.create') }}" class="btn btn-primary mx-3">Add Book</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
