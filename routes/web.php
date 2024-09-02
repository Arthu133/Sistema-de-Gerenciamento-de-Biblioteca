<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;




// Rota para exibir a lista de usuários
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Rota para exibir o formulário para criar um novo usuário
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Rota para armazenar um novo usuário
Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Rota para exibir o formulário para editar um usuário existente
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Rota para atualizar um usuário existente
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::resource('users', UserController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('loans', LoanController::class);
Route::get('/', [HomeController::class, 'index']);
Route::post('/books', [BookController::class, 'store'])->name('books.store');







;
