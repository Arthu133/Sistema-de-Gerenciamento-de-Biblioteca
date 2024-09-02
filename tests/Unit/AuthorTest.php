<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_have_many_books()
    {
        $author = Author::factory()->create();
        $books = Book::factory(3)->create(['author_id' => $author->id]);

        $this->assertInstanceOf(Book::class, $author->books->first());
        $this->assertCount(3, $author->books);
    }
}
