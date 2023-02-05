@extends('layouts.auth')

@section('title', 'Login')

@section('content');
    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box rounded-1">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="mb-3">
                    <a href="/register" class="nav-link">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
