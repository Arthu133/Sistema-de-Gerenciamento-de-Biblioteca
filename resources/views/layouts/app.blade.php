{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Biblioteca</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Biblioteca</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Livros</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('authors.index') }}">Autores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuários</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('loans.index') }}">Empréstimos</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
