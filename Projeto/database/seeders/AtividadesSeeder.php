<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Atividade;

class AtividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        Atividade::factory(40)->create();
    }
}
