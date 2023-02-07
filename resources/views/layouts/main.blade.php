<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarNavDropdown">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                            <a href="/books" @if (request()->route()->uri == 'books' ||
                                    request()->route()->uri == 'book-add' ||
                                    request()->route()->uri == 'book-edit/{slug}' ||
                                    request()->route()->uri == 'book-delete/{slug}' ||
                                    request()->route()->uri == 'book-deleted') class="active" @endif>Books</a>
                            <a href="/categories" @if (request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'category-add' ||
                                    request()->route()->uri == 'category-edit/{slug}' ||
                                    request()->route()->uri == 'category-delete/{slug}' ||
                                    request()->route()->uri == 'category-deleted') class="active" @endif>Categories</a>
                            <a href="/users" @if (request()->route()->uri == 'users' ||
                                    request()->route()->uri == 'users-registered' ||
                                    request()->route()->uri == 'user-activated/{slug}' ||
                                    request()->route()->uri == 'user-detail/{slug}' ||
                                    request()->route()->uri == 'user-block/{slug}' ||
                                    request()->route()->uri == 'user-destroy/{slug}' ||
                                    request()->route()->uri == 'user-blocked' ||
                                    request()->route()->uri == 'user-unblock/{slug}') class="active" @endif>Users</a>
                            <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class="active" @endif>Book Rent</a>
                            <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class="active" @endif>Rent Log</a>
                        @else
                            <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                        @endif
                        <a href="/" @if (request()->route()->uri == '/') class="active" @endif>Book List</a>
                        <a href="/logout">Logout</a>
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>

                <div class="content col-lg-10 p-5">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
