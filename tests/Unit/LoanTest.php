<?php

namespace Tests;

use Tests\TestCase;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


##Verifica o relacionamento de Loan com Book e User.


class LoanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_loan_belongs_to_a_book()
    {
        $book = Book::factory()->create();
        $loan = Loan::factory()->create(['book_id' => $book->id]);

        $this->assertInstanceOf(Book::class, $loan->book);
        $this->assertEquals($book->id, $loan->book_id);
    }

    /** @test */
    public function a_loan_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $loan = Loan::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $loan->user);
        $this->assertEquals($user->id, $loan->user_id);
    }
}
