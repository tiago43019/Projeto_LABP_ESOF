<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\AtividadeFactory;


class Atividade extends Model
{
    use HasFactory;

    protected $factory = AtividadeFactory::class;
    

    protected $fillable = [
        'nome',
        'descricao',
        'link_foto',
        'duracao',
        'preco',
        'pontuacao',
    ];

}
