<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('loans', LoanController::class);
Route::get('/', [HomeController::class, 'index']);


;
