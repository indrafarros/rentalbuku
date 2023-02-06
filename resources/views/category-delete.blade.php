@extends('layouts.main')

@section('title', 'Add category')

@section('content')
    <h2>Are you sure delete category {{ $category->name }} </h2>

    <div class="mt-5">
        <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger me-2">Yes</a>
        <a href="/categories" class="btn btn-primary">No</a>
    </div>
@endsection
