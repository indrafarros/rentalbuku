@extends('layouts.main')

@section('title', 'Books')

@section('content')
    <h2>Book List</h2>

    <div class="my-5 d-flex justify-content-end">
        <a href="/book-add" class="btn btn-primary">Add new data</a>
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
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
