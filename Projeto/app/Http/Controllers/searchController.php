<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;

class searchController extends Controller
{

    //Retorna a pesquisa na base dados
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Atividade::where('nome', 'like', "%$query%")->limit(5)->get();

        return response()->json($results);
    }
}
