<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $book = Book::all();
        return view('book-rent', ['user' => $user, 'book' => $book]);
    }

    public function store(Request $request)
    {
        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Cannot rent, the book is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/book-rent');
        } else {
            $request['rent_date'] = Carbon::now();
            $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

            $count = RentLogs::where('user_id', $request->user_id)->where('actuan_return_date', null)->count();
            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, user has reach limit of rent books');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    RentLogs::create($request->all());

                    $books = Book::findOrFail($request->book_id);
                    $books->status = 'not available';
                    $books->save();
                    DB::commit();

                    Session::flash('message', 'Rent book success!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('/book-rent');
                } catch (\Throwable $th) {
                    DB::rolback();
                }
            }
        }
    }

    public function returnBook()
    {
        $user = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $book = Book::all();
        return view('return-book', ['user' => $user, 'book' => $book]);
    }

    public function saveReturnBook(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actuan_return_date', null);
        $rentData = $rent->first();
        $rentCount = $rent->count();

        if ($rentCount == 1) {
            $rentData->actuan_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            Session::flash('message', 'The book is returned successfully');
            Session::flash('alert-class', 'alert-success');

            return redirect('rent-return');
        } else {
            Session::flash('message', 'There is error in process');
            Session::flash('alert-class', 'alert-danger');

            return redirect('rent-return');
        }
    }
}
