{{-- resources/views/authors/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Autor</h1>
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $author->name }}" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
