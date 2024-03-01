@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Library</h1>
        <h2>Books</h2>

        <form method="GET" action="{{ route('books.filter') }}">
            <input type="text" name="query" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>

        @if ($books->count() > 0)
            <ul>
                @foreach ($books as $book)
                    <li>{{ $book->name }} ({{ $book->release_date }})
                        <form method="POST" action="{{ route('books.delete', $book->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('books.edit', $book->id) }}"><button>Edit</button></a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No books found.</p>
        @endif
    </div>
@endsection
