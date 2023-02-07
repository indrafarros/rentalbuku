@extends('layouts.main')

@section('title', 'User Detail')

@section('content')
    <h2>Detail user {{ $user->username }}</h2>

    <div class="my-5">
        <div class="w-25">
            <div class="mb-3">
                <label for="username">User</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" readonly>
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" rows="3" class="form-control" readonly style="resize:none">{{ $user->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" readonly
                    value="{{ ucfirst($user->status) }}">
            </div>
            @if ($user->status == 'inactive')
                <div class="mb-3">
                    <a href="/user-activated/{{ $user->slug }}" class="btn btn-success">Approve user</button>
                </div>
            @endif
        </div>
    </div>
@endsection
