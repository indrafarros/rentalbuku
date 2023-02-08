@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <h2>Welcome back, {{ $user->username }}</h2>
    <div class='mt-5'>

        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
