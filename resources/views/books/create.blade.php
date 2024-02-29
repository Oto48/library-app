<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>
    <div id="app">
        <form @submit.prevent="submitForm">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" v-model="book.name"><br><br>

            <label for="release_date">Release Date:</label><br>
            <input type="date" id="release_date" v-model="book.release_date"><br><br>

            <label for="status">Status:</label><br>
            <select id="status" v-model="book.status">
                <option value="Free">Free</option>
                <option value="Busy">Busy</option>
            </select><br><br>

            <div v-for="(author, index) in book.authors" :key="index">
                <label v-if="index === 0" for="authors">Authors:</label><br>
                <input type="text" v-model="book.authors[index]" :placeholder="'Author ' + (index + 1)">
                <button type="button" @click="removeAuthor(index)" v-if="index !== 0">Remove</button><br>
            </div>

            <button type="button" @click="addAuthor">Add More Author</button><br><br>

            <input type="submit" value="Submit">
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
                            console.log(response);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            }
        });
    </script>
</body>
</html>
