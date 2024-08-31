{{-- resources/views/books/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Livro</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="author_id">Autor</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Ano de Publicação</label>
                <input type="text" name="year" id="year" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
