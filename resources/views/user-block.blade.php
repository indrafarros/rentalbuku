@extends('layouts.main')

@section('title', 'Block user')

@section('content')
    <h2>Are you sure block user "{{ $user->username }}" ?</h2>

    <div class="mt-5">
        <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger me-2">Yes</a>
        <a href="/users" class="btn btn-primary">No</a>
    </div>
@endsection
