{{-- resources/views/loans/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo Empréstimo</h1>
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Usuário</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book_id">Livro</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="due_date">Data Prevista de Devolução</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
