<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class Criaratividade extends TestCase
{
    use RefreshDatabase;

    public function testCriarAtividade(): void
    {
       
        $atividadeData = [
            'nome' => 'Atividade',
            'descricao' => 'Descrição',
            'link_foto' => 'teste',
            'duracao' => 60,
            'preco' => 25.99,
            'pontuacao' => 4.5,
        ];

        // Faz Post
        $response = $this->post('/criaratividade', $atividadeData);

        // Verifica se a atividade foi criada
        $response->assertStatus(302); 

    }
}
