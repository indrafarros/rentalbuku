<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/book-add', [BookController::class, 'create']);
        Route::post('/book-add', [BookController::class, 'store']);
        Route::get('/book-edit/{slug}', [BookController::class, 'edit']);
        Route::put('/book-edit/{slug}', [BookController::class, 'update']);
        Route::get('/book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('/book-destroy/{id}', [BookController::class, 'destroy']);
        Route::get('/book-deleted', [BookController::class, 'deleted']);
        Route::get('/book-restore/{slug}', [BookController::class, 'restore']);

        Route::get('/category-add', [CategoryController::class, 'create']);
        Route::post('/category-add', [CategoryController::class, 'store']);
        Route::get('/category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('/category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('/category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('/category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('/category-deleted', [CategoryController::class, 'deleted']);
        Route::get('/category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users-registered', [UserController::class, 'userRegistered']);
        Route::get('/user-activated/{slug}', [UserController::class, 'userActivated']);
        Route::get('/user-detail/{slug}', [UserController::class, 'show']);
        Route::get('/user-block/{slug}', [UserController::class, 'delete']);
        Route::get('/user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('/user-blocked', [UserController::class, 'blockedUser']);
        Route::get('/user-unblock/{slug}', [UserController::class, 'unblockUser']);

        Route::get('/categories', [CategoryController::class, 'index']);

        Route::get('/rent-logs', [RentLogController::class, 'index']);

        Route::get('/book-rent', [BookRentController::class, 'index']);
        Route::post('/book-rent', [BookRentController::class, 'store']);

        Route::get('/rent-return', [BookRentController::class, 'returnBook']);
        Route::post('/rent-return', [BookRentController::class, 'saveReturnBook']);
    });

    Route::middleware(['client'])->group(function () {
        Route::get('/profile', [UserController::class, 'profile']);
    });

    Route::get('/books', [BookController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
