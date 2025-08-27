<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //Get /api/books
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

   
    //Add a new book
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'nullable|integer|min:1000|max:'.date('Y'),
        ]);

        $book = Book::create($validate);

        return response() -> json($book,201);
    }

    public function index() {
        return Book::all();
    }

    public function store(Request $request) {
        return Book::create($request->all());
    }

    public function show($id) {
        return Book::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return $book;
    }

    public function destroy($id) {
        Book::destroy($id);
        return response()->json(['message' => 'Book deleted']);
    }
}
