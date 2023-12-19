<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;

class atividadesController extends Controller
{
    public function index()
    {
        // Busca todas as atividades do banco de dados
        $atividades = Atividade::all();

        // Retorna a view com as atividades
        return view('home', compact('atividades'));
    }
}
