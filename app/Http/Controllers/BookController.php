<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'authors' => 'required|array',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->publication_year = $request->publication_year;
        // O unique_identifier será gerado automaticamente
        $book->save();

        $book->authors()->attach($request->authors);

        return redirect()->route('books.index')
                         ->with('success', 'Livro criado com sucesso.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'authors' => 'required|array',
        ]);

        $book->update($request->only(['title', 'publication_year']));
        $book->authors()->sync($request->authors);

        return redirect()->route('books.index')
                         ->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
                         ->with('success', 'Livro excluído com sucesso.');
    }
}
