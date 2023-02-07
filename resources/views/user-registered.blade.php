@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <h2>User List</h2>

    <div class="my-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary me-2">Back</a>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="/user-activated/{{ $item->slug }}" class="btn btn-primary">Activated user</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
