@extends('layouts.main')

@section('title', 'Edit book')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <h2>Edit book {{ $book->title }}</h2>
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
        <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="code" class="form-label">Book Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" value="{{ $book->book_code }}"
                    placeholder="Book's Code" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}"
                    placeholder="Book's title" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-select category-multiple" multiple>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}"
                            @foreach ($book->categories as $val) @if ($val->id == $item->id) selected @endif @endforeach>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}"
                    placeholder="Book's author" required>
            </div>
            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display: block">Current Cover</label>
                @if ($book->cover != '')
                    <img width="200px" src="{{ asset('storage/cover/' . $book->cover) }}" alt="">
                @else
                    <img width="200px" src="{{ asset('storage/cover/Belajar Budi daya lele-1675739154.jpeg') }}"
                        alt="">
                @endif
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
