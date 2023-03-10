@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <h2>User List</h2>

    <div class="my-5 d-flex justify-content-end">
        <a href="/users-registered" class="btn btn-primary me-2">Show registered users</a>
        <a href="/user-blocked" class="btn btn-secondary">Show blocked user</a>
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
                            <a href="/user-detail/{{ $item->slug }}" class="btn btn-primary">Detail</a>
                            <a href="/user-block/{{ $item->slug }}" class="btn btn-warning">Blocked user</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
