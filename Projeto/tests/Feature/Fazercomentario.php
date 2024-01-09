<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Atividade;
use App\Models\Comentario;

class Fazercomentario extends TestCase
{
    use RefreshDatabase;

    public function testFazerComentario(): void
    {
        // Cria um user para poder fazer o comentario
        $user = User::factory()->create();

        // Cria uma atividade de exemplo
        $atividade = Atividade::factory()->create();

        $comentarioData = [
            'content' => 'Teste de comentário',
        ];

        // Fazer login com o user criado
        $this->actingAs($user);

        // Fazer Post
        $response = $this->post("/atividades/{$atividade->id}/comentarios", $comentarioData);

        $response->assertStatus(302); 

    }
}
