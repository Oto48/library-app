<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/books/create', 'BookController@create')->name('books.create');
// Route::post('/books', 'BookController@store')->name('books.store');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
Route::post('/books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');