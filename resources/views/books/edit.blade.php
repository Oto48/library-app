<!-- resources/views/books/edit.blade.php -->
@extends('layout.layout')

@section('content')
    <div class="container" id="app">
        <h1>Edit Book</h1>
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" v-model="book.name"><br><br>

            <label for="release_date">Release Date:</label><br>
            <input type="date" id="release_date" name="release_date" v-model="book.release_date"><br><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" v-model="book.status">
                <option value="Free">Free</option>
                <option value="Busy">Busy</option>
            </select><br><br>

            <label for="authors">Authors:</label><br>
            <div v-for="(author, index) in book.authors" :key="index">
                <input type="text" v-model="book.authors[index]" name="authors[]">
                <button type="button" @click="removeAuthor(index)">Remove</button>
            </div>
            <button type="button" @click="addAuthor">Add Author</button><br><br>

            <input type="submit" value="Update">
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
                    this.book.authors.splice(index, 1);
                }
            }
        });
    </script>
@endsection
