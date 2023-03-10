@extends('layouts.main')

@section('title', 'Add new book')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-select category-multiple" multiple>
                    @foreach ($categories as $val)
                        <option value="{{ $val->id }}">{{ ucfirst($val->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}"
                    placeholder="Book's author" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Book Cover</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.category-multiple').select2();
        });
    </script>
@endsection
