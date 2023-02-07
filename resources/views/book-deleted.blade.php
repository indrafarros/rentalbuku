@extends('layouts.main')

@section('title', 'Books')

@section('content')
    <h2>Book List</h2>

    <div class="my-5 ">
        <a href="/books" class="btn btn-primary">Back</a>
    </div>

    <div class="my-5">
        @if (Session::has('status'))
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookList as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->categories as $val)
                                - {{ ucfirst($val->name) }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-restore/{{ $item->slug }}" class="btn btn-warning">Restore data</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
