<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;


class ReservasTableSeeder extends Seeder
{
    public function run()
    {
        Reserva::factory(5)->create();
    }
}
