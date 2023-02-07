<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
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
        $category = Category::all();
        return view('book-add', ['categories' => $category]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|unique:books|max:255',
            'author' => 'required'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $ext;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;
        $book =  Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('/books')->with('status', 'Add book successfuly');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $category = Category::all();
        return view('book-edit', ['book' => $book, 'category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $ext;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }
        $book = Book::where('slug', $slug)->first();

        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('/books')->with('status', 'Update book successfully');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();

        return view('book-delete', ['book' => $book]);
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();

        if ($book->cover != '') {
        }
        $book->delete();
        return redirect('/books')->with('status', 'Book delete successfully');
    }

    public function deleted()
    {
        $book = Book::onlyTrashed()->get();
        return view('book-deleted', ['bookList' => $book]);
    }
    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();

        return redirect('book-deleted')->with('status', 'Book restore successfuly');
    }
}
