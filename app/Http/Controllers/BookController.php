<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $book = Book::all();
        return view('book', ['bookList' => $book]);
    }

    public function create()
    {
        return view('book-add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|unique:books|max:255',
            'author' => 'required'
        ]);
        Book::create($request->all());

        return redirect('/books')->with('status', 'Add book successfuly');
    }
}
