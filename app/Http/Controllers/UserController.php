<?php

namespace App\Http\Controllers;

use App\Models\User; // Importa o modelo User
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtém todos os usuários
        return view('users.index', compact('users')); // Passa a variável $users para a view
    }

    public function create()
    {
        return view('users.create'); // Retorna a view para criar um novo usuário
    }
    public function destroy($id)
    {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')
                     ->with('success', 'User deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save(); // Eloquent gerencia automaticamente created_at e updated_at

        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); // Obtém o usuário pelo ID ou lança uma exceção se não encontrado
        return view('users.edit', compact('user')); // Passa a variável $user para a view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->save();

        return redirect()->route('users.index'); // Redireciona para a lista de usuários
    }
}

