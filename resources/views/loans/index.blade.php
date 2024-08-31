{{-- resources/views/loans/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Empréstimos</h1>
        <a href="{{ route('loans.create') }}" class="btn btn-primary">Novo Empréstimo</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Livro</th>
                    <th>Data de Empréstimo</th>
                    <th>Data Prevista de Devolução</th>
                    <th>Data de Devolução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->user->name }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->due_date }}</td>
                        <td>{{ $loan->return_date ?? 'Ainda não devolvido' }}</td>
                        <td>
                            @if(is_null($loan->return_date))
                                <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancelar</button>
                                </form>
                            @else
                                <span class="text-muted">Devolvido</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
