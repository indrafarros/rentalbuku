@extends('layouts.auth')

@section('title', 'Register new account')

@section('content')
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if ($errors->any())
            <div class="alert alert-danger" style="width:500px">
                <ul>
                    @foreach ($errors->all() as $val)
                        <li>{{ $val }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-box rounded-1">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="address" cols="30" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="mb-3 text-center">
                    Have an account ? <a href="/login">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
