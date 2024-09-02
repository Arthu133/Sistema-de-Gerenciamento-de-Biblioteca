{{-- resources/views/books/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Livros</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano de Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>
                            @foreach($book->authors as $author)
                                {{ $author->name }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ $book->year }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
