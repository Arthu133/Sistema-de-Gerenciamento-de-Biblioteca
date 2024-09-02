<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class IntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_list_is_accessible_and_displays_users()
    {
        // Criando usuários fictícios no banco de dados
        $user1 = User::factory()->create(['name' => 'Alice']);
        $user2 = User::factory()->create(['name' => 'Bob']);
        
        // Acessando a rota de listagem de usuários
        $response = $this->get('/users');
        
        // Verificando se a rota retorna status 200
        $response->assertStatus(200);
        
        // Verificando se a resposta contém os nomes dos usuários criados
        $response->assertSee('Alice');
        $response->assertSee('João');
    }
}
