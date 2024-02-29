@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Library</h1>
        <h2>Books</h2>

        @if ($books->count() > 0)
            <ul>
                @foreach ($books as $book)
                    <li>{{ $book->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No books found.</p>
        @endif
    </div>
@endsection
