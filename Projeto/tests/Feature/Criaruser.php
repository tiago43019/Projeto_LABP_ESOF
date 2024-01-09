<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class Criaruser extends TestCase
{
    use RefreshDatabase;

    public function testCriarUser(): void
    {
        $userData = [
            'nome_completo' => 'João Silva',
            'username' => 'jsilvaa',
            'numero_telemovel' => '123456789',
            'email' => 'jota@gmail.com',
            'password' => 'teste12345',
        ];

        // Faz Post
        $response = $this->post('/register', $userData);

        // Verifica se o user foi criado com sucesso
        $response->assertStatus(302);

    }
}
