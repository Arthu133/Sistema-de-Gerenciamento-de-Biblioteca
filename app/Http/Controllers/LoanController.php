<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['book', 'user'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('loans.create', compact('books', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
        ]);

        Loan::create($request->all());

        return redirect()->route('loans.index')
                         ->with('success', 'Empréstimo registrado com sucesso.');
    }

    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        $books = Book::all();
        $users = User::all();
        return view('loans.edit', compact('loan', 'books', 'users'));
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        $loan->update($request->all());

        return redirect()->route('loans.index')
                         ->with('success', 'Empréstimo atualizado com sucesso.');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')
                         ->with('success', 'Empréstimo excluído com sucesso.');
    }
}
