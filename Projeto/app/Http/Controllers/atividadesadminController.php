<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Pagination\Paginator;

class atividadesadminController extends Controller
{
    //Paginação com x atividades por pagina
    public function index()
    {
        
        $atividades = Atividade::all();
        Paginator::useBootstrap();
        $atividades = Atividade::paginate(12); // x atividades por cada pagina
        foreach ($atividades as $atividade) {
            $atividade->link_foto = 'https://picsum.photos/900/600?seed=' . $atividade->id;
        }
        return view('adminhome', compact('atividades'));
    }

}
