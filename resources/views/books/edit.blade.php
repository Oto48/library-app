@extends('layout.layout')

@section('content')
    <div class="container" id="app">
        <h1>Edit Book</h1>
        <form method="POST" action="{{ route('books.update', $book->id) }}" class="border p-4 rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" v-model="book.name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date:</label>
                <input type="date" id="release_date" name="release_date" v-model="book.release_date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" name="status" v-model="book.status" class="form-select">
                    <option value="Free">Free</option>
                    <option value="Busy">Busy</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="authors" class="form-label">Authors:</label>
                <div class="mb-3" v-for="(author, index) in book.authors" :key="index" class="d-flex">
                    <input type="text" v-model="book.authors[index]" name="authors[]" class="form-control me-2">
                    <!-- Conditionally render the remove button -->
                    <button v-if="book.authors.length > 1" type="button" @click="removeAuthor(index)" class="btn btn-danger">Remove</button>
                </div>
                <button type="button" @click="addAuthor" class="btn btn-primary mt-3">Add Author</button>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                book: @json($book)
            },
            methods: {
                addAuthor() {
                    this.book.authors.push('');
                },
                removeAuthor(index) {
                    if (this.book.authors.length > 1) {
                        this.book.authors.splice(index, 1);
                    }
                }
            }
        });
    </script>
@endsection
