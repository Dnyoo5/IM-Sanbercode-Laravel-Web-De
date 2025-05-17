<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('genres')->group(function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/{id}', [GenreController::class, 'showPublic'])->name('genres.show.public');
});

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/{id}', [BookController::class, 'show'])->name('books.show');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::middleware('auth')->group(function () {

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::post('/books/{book}/comments', [CommentsController::class, 'store'])->name('books.comments.store');

    Route::middleware('admin')->prefix('admin')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
            Route::get('/datatable', [DashboardController::class, 'datatable'])->name('admin.dashboard.datatable');
        });

        // 📁 Genre Management
        Route::prefix('genres')->group(function () {
            Route::get('/', [GenreController::class, 'adminIndex'])->name('admin.genres.index');
            Route::get('/datatable', [GenreController::class, 'datatable'])->name('admin.genres.datatable');
            Route::get('/create', [GenreController::class, 'create'])->name('admin.genres.create');
            Route::post('/', [GenreController::class, 'store'])->name('admin.genres.store');
            Route::get('/edit/{id}', [GenreController::class, 'edit'])->name('admin.genres.edit');
            Route::get('/show/{id}', [GenreController::class, 'show'])->name('admin.genres.show');
            Route::put('/{genre}', [GenreController::class, 'update'])->name('admin.genres.update');
            Route::get('/{id}', [GenreController::class, 'destroy'])->name('admin.genres.destroy');
        });

        // 📁 Book Management
        Route::prefix('books')->group(function () {
            Route::get('/', [BookController::class, 'adminIndex'])->name('admin.books.index');
            Route::get('/datatable', [BookController::class, 'datatable'])->name('admin.books.datatable');
            Route::get('/create', [BookController::class, 'create'])->name('admin.books.create');
            Route::post('/', [BookController::class, 'store'])->name('admin.books.store');
            Route::get('/edit/{id}', [BookController::class, 'edit'])->name('admin.books.edit');
            Route::put('/{id}', [BookController::class, 'update'])->name('admin.books.update');
            Route::get('/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');
            Route::get('/datatable', [UsersController::class, 'datatable'])->name('admin.users.datatable');
            Route::get('/create', [UsersController::class, 'create'])->name('admin.users.dreate');
            Route::post('/', [UsersController::class, 'store'])->name('admin.users.store');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
            Route::get('/show/{id}', [UsersController::class, 'show'])->name('admin.users.show');
            Route::put('/{id}', [UsersController::class, 'update'])->name('admin.users.update');
            Route::get('/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
        });
    });
});
