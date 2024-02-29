@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Library</h1>
        <h2>Books</h2>

        @if ($books->count() > 0)
            <ul>
                @foreach ($books as $book)
                    <li>{{ $book->name }}</li>
                    <li>{{ $book->release_date }}</li>
                @endforeach
            </ul>
        @else
            <p>No books found.</p>
        @endif
    </div>
@endsection
