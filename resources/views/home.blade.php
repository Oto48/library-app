@extends('layout.layout')

@section('content')
    <h1>Library</h1>
    <h2>Books</h2>

    <form method="GET" action="{{ route('books.filter') }}" class="mb-3">
        <div class="row">
            <div class="col-sm-6">
                <input type="text" name="query" class="form-control" placeholder="Search by name">
            </div>
            <div class="col-sm-6">
                <input type="text" name="author" class="form-control" placeholder="Search by author">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Search</button>
    </form>

    @if ($books->count() > 0)
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card {{ $book->status === 'Busy' ? 'card-danger text-white' : '' }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                Name: {{ $book->name }}
                            </h5>
                            <h5 class="card-text">
                                Authors:
                                @foreach ($book->authors as $author)
                                    {{ $author }},
                                @endforeach
                            </h5>
                            <h6 class="card-text">
                                Status: {{ $book->status }}
                            </h6>
                            <p class="card-text">
                                release_date: {{ $book->release_date }}
                            </p>
                            <form method="POST" action="{{ route('books.delete', $book->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No books found.</p>
    @endif
@endsection
