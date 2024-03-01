@extends('layout.layout')

@section('content')
    <div id="app" class="container">
        <form @submit.prevent="submitForm" class="border p-4 rounded">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" v-model="book.name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date:</label>
                <input type="date" id="release_date" v-model="book.release_date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" v-model="book.status" class="form-select">
                    <option value="Free">Free</option>
                    <option value="Busy">Busy</option>
                </select>
            </div>

            <div v-for="(author, index) in book.authors" :key="index">
                <label v-if="index === 0" for="authors" class="form-label">Authors:</label>
                <div class="input-group mb-3">
                    <input type="text" v-model="book.authors[index]" :placeholder="'Author ' + (index + 1)" class="form-control">
                    <button type="button" @click="removeAuthor(index)" v-if="index !== 0" class="btn btn-outline-danger">Remove</button>
                </div>
            </div>

            <button type="button" @click="addAuthor" class="btn btn-primary">Add More Author</button><br><br>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                book: {
                    name: '',
                    release_date: '',
                    status: 'Free',
                    authors: ['']
                }
            },
            methods: {
                addAuthor() {
                    this.book.authors.push('');
                },
                removeAuthor(index) {
                    this.book.authors.splice(index, 1);
                },
                submitForm() {
                    axios.post('/books', this.book)
                        .then(response => {
                            window.location.href = '{{ route("home") }}';
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            }
        });
    </script>
@endsection
