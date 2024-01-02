<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\Comentario;
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
    $atividade = Atividade::with('comentarios.user')->find($id);
    $comentarios = $atividade->comentarios;


    // Retorna a view com os dados da atividade
    return view('atividade', compact('atividade', 'comentarios'));
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


    public function adicionarComentario(Request $request, $atividadeId)
{
    // Valide a solicitação
    $request->validate([
        'content' => 'required|max:255',
    ]);

    // Verifique se o usuário está autenticado
    if (Auth::check()) {
        // Obtém o ID do usuário autenticado
        $userId = Auth::id();

        // Crie um novo comentário
        $comment = new Comentario([
            'user_id' => $userId,
            'atividade_id' => $atividadeId,
            'content' => $request->input('content'),
        ]);

        // Salve o comentário no banco de dados
        $comment->save();

        // Redirecione de volta à página de atividade com uma mensagem de sucesso
        return redirect('/atividades/' . $atividadeId)->with('success', 'Comentário adicionado com sucesso!');
    }

    // O usuário não está autenticado, redirecione ou retorne um erro
    // Você pode personalizar isso conforme necessário
    return redirect('/atividades/' . $atividadeId)->with('error', 'Você precisa estar autenticado para adicionar um comentário.');
}
}
