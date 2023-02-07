@extends('layouts.main')

@section('title', 'Book Rent')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="col-12 col-md-6 offset-md-2 col-lg-6">
        <h2>Rent Book</h2>

        <div class="mt-4">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}</div>
            @endif
        </div>
        <div class="my-5">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" id="user_id" class="form-control select-user">
                        <option value="">Select user</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="book_id" class="form-label">Book</label>
                    <select name="book_id" id="book_id" class="form-select select-book" multiple>
                        @foreach ($book as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select-user').select2();
            $('.select-book').select2();
        });
    </script>
@endsection
