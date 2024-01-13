<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ReservaFactory;


class Reserva extends Model
{
    use HasFactory;

    protected $factory = ReservaFactory::class;
    

    protected $fillable = [
        'user_id',
        'atividade_id',
        'preco',
        'data',
        'duracao',
    ];
}
