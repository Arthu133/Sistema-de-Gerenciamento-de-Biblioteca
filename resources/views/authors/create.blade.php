{{-- resources/views/authors/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Autor</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
