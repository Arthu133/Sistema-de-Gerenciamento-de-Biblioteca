<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;



##Verifica o relacionamento de Book com Author e Loan.

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_belongs_to_an_author()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $this->assertInstanceOf(Author::class, $book->author);
        $this->assertEquals($author->id, $book->author_id);
    }

    /** @test */
    public function a_book_can_have_many_loans()
    {
        $book = Book::factory()->create();
        $loans = Loan::factory(3)->create(['book_id' => $book->id]);

        $this->assertInstanceOf(Loan::class, $book->loans->first());
        $this->assertCount(3, $book->loans);
    }
}
