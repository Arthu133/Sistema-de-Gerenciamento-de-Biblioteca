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
                <label for="authors">Authors</label>
                <select name="authors[]" id="authors" class="form-control" multiple required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="number" name="publication_year" id="publication_year" class="form-control" value="{{ old('publication_year') }}" required>
            </div>
            
            <!-- <div class="form-group">
                <label for="unique_identifier">Unique Identifier</label>
                <input type="text" name="unique_identifier" id="unique_identifier" class="form-control" value="{{ old('unique_identifier') }}" required>
            </div> -->


            
            <button type="submit" class="btn btn-success">Salvar</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>

    </div>
@endsection
