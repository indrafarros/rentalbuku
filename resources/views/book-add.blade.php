@extends('layouts.main')

@section('title', 'Add new book')

@section('content')
    <h2>Add new book</h2>

    <div class="my-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/book-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Book Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" value="{{ old('book_code') }}"
                    placeholder="Book's Code" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                    placeholder="Book's title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}"
                    placeholder="Book's author" required>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" name="cover" id="cover" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>

    </div>

@endsection
