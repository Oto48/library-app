<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function delete(Book $book)
    {
        $book->delete();
    
        return redirect()->route('home')->with('success', 'Book deleted successfully!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'status' => 'required|in:Free,Busy',
            'authors.*' => 'string|max:255', // Validate each author individually
        ]);
    
        $book->update([
            'name' => $validatedData['name'],
            'release_date' => $validatedData['release_date'],
            'status' => $validatedData['status'],
            'authors' => $validatedData['authors'], // Update authors array
        ]);
    
        return redirect()->route('home')->with('success', 'Book updated successfully!');
    }

    public function filter(Request $request)
    {
        $query = $request->get('query');
        $author = $request->get('author');
    
        $books = Book::query();
    
        if ($query) {
            $books->where('name', 'like', '%' . $query . '%');
        }
    
        if ($author) {
            $books->whereJsonContains('authors', $author);
        }
    
        $books = $books->get();
    
        return view('home', compact('books'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'status' => 'required|in:Free,Busy',
        ]);
    
        // Create new book
        $book = new Book();
        $book->authors = $request->authors;
        $book->name = $request->name;
        $book->release_date = $request->release_date;
        $book->status = $request->status;
        $book->save();
    
        return redirect()->route('books.create')->with('success', 'Book added successfully!');
    }
    
}
