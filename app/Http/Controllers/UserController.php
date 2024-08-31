<?php

namespace App\Http\Controllers;

use App\Models\User; // Certifique-se de que o modelo User está sendo importado
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ou qualquer lógica para obter a lista de usuários
        return view('users.index', compact('users')); // Passa a variável $users para a view
    }
    public function create()
    {
        return view('users.create'); // Retorna a view para criar um novo usuário
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Obtém o usuário pelo ID ou lança uma exceção se não encontrado
        return view('users.edit', compact('user')); // Passa a variável $user para a view
    }
}
