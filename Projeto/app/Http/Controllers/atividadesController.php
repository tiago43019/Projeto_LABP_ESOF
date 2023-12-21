<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Pagination\Paginator;


class atividadesController extends Controller
{
    public function index()
    {
        // Busca todas as atividades do banco de dados
        $atividades = Atividade::all();
        Paginator::useBootstrap(); // Isso usa o estilo de paginação Bootstrap, você pode personalizar conforme necessário
        $atividades = Atividade::paginate(8); // 8 atividades por página
        // Retorna a view com as atividades
        return view('home', compact('atividades'));
    }
}
