<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('home');
    Route::resource('users', UsersController::class);
    Route::resource('posts', PostsController::class);
    Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
});

Route::get('/login', [UsersController::class, 'loginForm'])->name('login');
Route::post('/login', [UsersController::class, 'login'])->name('users.login');
