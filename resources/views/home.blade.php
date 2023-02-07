@extends('layouts.main')

@section('title', 'List Book')

@section('content')
    <h2>Welcome</h2>

    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-select">
                    <option value="">Select category</option>
                    @foreach ($categories as $val)
                        <option value="{{ $val->id }}"> {{ $val->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" name="search" id="search" class="form-control"
                        placeholder="Search book's title" name="title">
                    <button class="btn btn-primary" type="submit">Search</button>

                </div>
            </div>
        </div>
    </form>

    <div class="my-5">
        <div class="row">
            @foreach ($book as $item)
                <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                    <div class="card h-100">
                        <img src="{{ $item->cover != '' ? asset('storage/cover/' . $item->cover) : asset('images/not_available.jpg') }}"
                            height="350px" class="card-img-top" draggable="false" alt="...">

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->book_code }}</h5>
                            <p class="card-text">{{ $item->title }}</p>
                            <p
                                class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                {{ $item->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
