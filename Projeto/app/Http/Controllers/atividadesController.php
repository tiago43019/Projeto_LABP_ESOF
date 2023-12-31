<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class atividadesController extends Controller
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
        return view('home', compact('atividades'));
    }

    public function showAtividade($id)
{
    // Busca a atividade específica pelo ID
    $atividade = Atividade::find($id);

    // Retorna a view com os dados da atividade
    return view('atividade', compact('atividade'));
}




public function adicionarAosFavoritos($atividadeId)
{
    // Verifique se o usuário está autenticado
    if (Auth::check()) {
        // Obtém o ID do usuário autenticado
        $userId = Auth::id();

        // Obtém o usuário
        $user = User::find($userId);

        // Adiciona a atividade aos favoritos
        $user->favoritos()->toggle($atividadeId);

        // Retorna uma resposta JSON indicando o status
        return response()->json([
            'isFavorito' => $user->favoritos()->where('atividade_id', $atividadeId)->exists(),
        ]);
    }

    // Retorna uma resposta JSON indicando que o usuário não está autenticado
    return response()->json(['error' => 'Usuário não autenticado'], 401);
}


public function favoritos()
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Obtém as atividades favoritas do usuário
            $favoritos = $user->favoritos;

            // Retorna a view com as atividades favoritas
            return view('favoritos', compact('favoritos'));
        }

        // Se o usuário não estiver autenticado, redireciona para a página de login
        return redirect('/login')->with('error', 'Faça login para ver seus favoritos.');
    }


}
