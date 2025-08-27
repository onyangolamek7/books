<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::apiResource('books', BookController::class);
Route::get('/books', [BookController::class, 'index']); //Fetch all books
Route::post('/books', [BookController::class, 'store']); //Add a new book
Route::get('/books/{id}', [BookController::class, 'show']); //Get single book
Route::put('/books/{id}', [BookController::class, 'update']); //Update book
Route::delete('/books/{id}', [BookController::class, 'destroy']); //Delete book
