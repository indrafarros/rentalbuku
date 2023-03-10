@extends('layouts.main')

@section('title', 'Category')

@section('content')
    <h2>Category List</h2>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/category-add" class="btn btn-primary me-3">Add Data</a>
        <a href="/category-deleted" class="btn btn-secondary">Show delete data</a>
    </div>

    <div class="mt-5">
        @if (Session::has('status'))
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $val)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucfirst($val->name) }}</td>
                        <td>
                            <a href="/category-edit/{{ $val->slug }}" class="btn btn-primary">Edit</a>
                            <a href="/category-delete/{{ $val->slug }}" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
