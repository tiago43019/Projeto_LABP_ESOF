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
        'user_id',
        'nome',
        'descricao',
        'link_foto',
        'duracao',
        'preco',
        'pontuacao',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}
