@extends('layouts.main')

@section('title', 'Delete book')

@section('content')
    <h2>Are you sure delete book "{{ $book->title }}" </h2>

    <div class="mt-5">
        <a href="/book-destroy/{{ $book->slug }}" class="btn btn-danger me-2">Yes</a>
        <a href="/books" class="btn btn-primary">No</a>
    </div>
@endsection
