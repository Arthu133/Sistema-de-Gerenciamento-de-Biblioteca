<?php

namespace Tests;

use Tests\TestCase;
use App\Models\User;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;


##Verifica o relacionamento de User com Loan.



class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_have_many_loans()
    {
        $user = User::factory()->create();
        $loans = Loan::factory(3)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Loan::class, $user->loans->first());
        $this->assertCount(3, $user->loans);
    }
}
