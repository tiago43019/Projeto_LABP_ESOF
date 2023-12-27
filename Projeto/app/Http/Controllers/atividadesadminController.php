<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Pagination\Paginator;

class atividadesadminController extends Controller
{
    public function index()
    {
        // Busca todas as atividades do banco de dados
        $atividades = Atividade::all();
        Paginator::useBootstrap(); // Isso usa o estilo de paginação Bootstrap, você pode personalizar conforme necessário
        $atividades = Atividade::paginate(12); // 12 atividades por página
        foreach ($atividades as $atividade) {
            $atividade->link_foto = 'https://picsum.photos/900/600?seed=' . $atividade->id;
        }
        // Retorna a view com as atividades
        return view('adminhome', compact('atividades'));
    }

    public function showAtividade($id)
{
    // Busca a atividade específica pelo ID
    $atividade = Atividade::find($id);

    // Retorna a view com os dados da atividade
    return view('atividade', compact('atividade'));
}
}
