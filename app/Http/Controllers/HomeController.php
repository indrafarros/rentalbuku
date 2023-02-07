<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->search) {
            $book = Book::where('title', 'LIKE', '%' . $request->search . '%')->orWhereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            })->get();
        } else {
            $book = Book::all();
        }
        return view('home', ['book' => $book, 'categories' => $categories]);
    }
}
