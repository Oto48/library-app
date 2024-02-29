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