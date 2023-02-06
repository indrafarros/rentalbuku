@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <h4>Welcome, {{ strtoupper(Auth::user()->username) }}</h4>
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="cardboxes book">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-text" style="font-size: 4.2rem"></i>
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div class="card-title">Books</div>
                        <div class="card-desc">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cardboxes category">
                <div class="row">
                    <div class="col-6"><i class="bi bi-bookmarks-fill" style="font-size: 4.2rem"></i>
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div class="card-title">Categories</div>
                        <div class="card-desc">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cardboxes users">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people-fill" style="font-size: 4.2rem"></i>
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div class="card-title">Users</div>
                        <div class="card-desc">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <h2>Recently Rent</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Rent Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Actual Return Date</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">No data</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
