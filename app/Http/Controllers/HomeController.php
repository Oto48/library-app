<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query();
    
        if ($request->filled('search')) {
            $books->where('name', 'like', '%' . $request->input('search') . '%');
        }
    
        $books = $books->get();
    
        return view('home', compact('books'));
    }
}
