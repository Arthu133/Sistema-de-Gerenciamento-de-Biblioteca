{{-- resources/views/loans/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Empréstimo</h1>
        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="return_date">Data de Devolução</label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $loan->return_date }}">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
