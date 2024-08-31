{{-- resources/views/books/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Livro</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author_id">Autor</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Ano de Publicação</label>
                <input type="text" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
