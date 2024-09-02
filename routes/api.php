<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rota de Login e Registro (sem middleware)
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']); // Adicionada

// Rotas protegidas pelo JWT Middleware
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'getUser']); // Adicionada
});

// Rota de Teste para API
Route::get('test-api', function () {
    return 'API route is working!';
});
