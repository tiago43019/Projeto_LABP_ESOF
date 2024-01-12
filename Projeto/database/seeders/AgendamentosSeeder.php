<?php

namespace Database\Seeders;

use App\Models\Agendamento;
use App\Models\Atividade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AgendamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $numeroDeAtividades = Atividade::count();
        $quantidadeDeAgendamentosPorAtividade = 5;

        for ($i = 1; $i <= $numeroDeAtividades; $i++) {
            for ($j = 0; $j < $quantidadeDeAgendamentosPorAtividade; $j++) {
                Agendamento::factory()->create([
                    'atividade_id' => $i
                ]);
            }
        }
    }
}
