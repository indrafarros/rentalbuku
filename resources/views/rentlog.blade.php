@extends('layouts.main')

@section('title', 'Rent Log')

@section('content')
    <h2>Rent Log List</h2>
    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
