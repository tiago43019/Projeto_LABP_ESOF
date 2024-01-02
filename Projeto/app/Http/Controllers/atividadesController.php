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
    //Paginação com x atividades por pagina
    public function index()
    {
        $atividades = Atividade::all();
        Paginator::useBootstrap();
        $atividades = Atividade::paginate(12); // x atividades por pagina
        foreach ($atividades as $atividade) {
            $atividade->link_foto = 'https://picsum.photos/900/600?seed=' . $atividade->id;
        }
        return view('home', compact('atividades'));
    }

    //Redireciona para pagina da atividade com seus dados e comentarios
    public function showAtividade($id)
{
    $atividade = Atividade::with('comentarios.user')->find($id);
    $comentarios = $atividade->comentarios;

    return view('atividade', compact('atividade', 'comentarios'));
}



    //Permite adicionar aos favoritos
    public function adicionarAosFavoritos($atividadeId)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);
            $user->favoritos()->toggle($atividadeId);

            return response()->json([
                'isFavorito' => $user->favoritos()->where('atividade_id', $atividadeId)->exists(),
            ]);
        }
        return response()->json(['error' => 'Usuário não autenticado'], 401);
    }

    //Ver favoritos caso esteja logado
    public function favoritos()
        {
            if (Auth::check()) {
                $user = Auth::user();
                $favoritos = $user->favoritos;

                return view('favoritos', compact('favoritos'));
            }
            return redirect('/login')->with('error', 'Faça login para ver seus favoritos.');
        }

    //Adiciona um comentário
    public function adicionarComentario(Request $request, $atividadeId)
{
    $request->validate([
        'content' => 'required|max:255',
    ]);

    if (Auth::check()) {
        $userId = Auth::id();
        $comment = new Comentario([
            'user_id' => $userId,
            'atividade_id' => $atividadeId,
            'content' => $request->input('content'),
        ]);
        $comment->save();

        return redirect('/atividades/' . $atividadeId)->with('success', 'Comentário adicionado com sucesso!');
    }
    return redirect('/atividades/' . $atividadeId)->with('error', 'Você precisa estar autenticado para adicionar um comentário.');
}
}
