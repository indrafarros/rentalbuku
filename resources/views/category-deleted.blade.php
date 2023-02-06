@extends('layouts.main')

@section('title', 'Deleted Category')

@section('content')
    <h2>Show Deleted Category List</h2>

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
                            <a href="/category-restore/{{ $val->slug }}" class="btn btn-primary">Restore data</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
