<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\Comentario;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
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
            if ($atividade->link_foto != 'https://picsum.photos/900/600'){
                // serve apenas para verificar se a foto que existe é diferente da foto que foi gerada pelo seeder
            } else {
            $atividade->link_foto = 'https://picsum.photos/900/600?seed=' . $atividade->id;
            }
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
        return response()->json(['error' => 'User não autenticado'], 401);
    }

    //Ver favoritos caso esteja logado
    public function favoritos()
        {
            if (Auth::check()) {
                $user = Auth::user();
                $favoritos = $user->favoritos;

                return view('favoritos', compact('favoritos'));
            }
            return redirect('/login')->with('error', 'Faça login para ver favoritos.');
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
    return redirect('/atividades/' . $atividadeId)->with('error', 'Precisa estar autenticado para adicionar um comentário.');
}

//Eliminar um comentário seja admin ou user normal
public function eliminarComentario($comentarioId)
{
    
    $comentario = Comentario::find($comentarioId);

    if(Auth::user()->is_admin){
        $comentario = Comentario::find($comentarioId);
        $comentario->delete();
        return redirect()->back()->with('success', 'Comentário eliminado com sucesso.');
    }

    if (Auth::check() && Auth::id() == $comentario->user_id) {
        $comentario->delete();
        return redirect()->back()->with('success', 'Comentário eliminado com sucesso.');
    }

    return redirect()->back()->with('error', 'Não tem permissão para eliminar este comentário.');
}


     //Permite criar uma atividade
     public function criarAtividade(Request $request)
     {
         $atividade = new Atividade();
 
         $atividade->user_id = auth::id();
         $atividade->nome = $request->nome;
         $atividade->descricao = $request->descricao;
         $atividade->duracao = $request->duracao;
         $atividade->preco = $request->preco;
         $atividade->pontuacao = 0.0;
         $atividade->created_at = now();

         if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/atividades');
            $atividade->link_foto = Storage::url($path);
        }
 
         $atividade->save();
     
 
         return redirect('/geriratividades');
 
     }
 
 
     //Ao clicar no botao editar atividade redireciona para a view com a atividade certa
     public function editarAtividade($id)
    {
     $atividade = Atividade::find($id);
     if (Auth::id() != $atividade->user_id) {
        abort(403, 'Acesso não autorizado');
    }
 
     return view('editarAtividades', compact('atividade'));
    }
 
 //Editar uma atividade já criada
 public function atualizarAtividade(Request $request, $id)
 {
     $atividade = Atividade::find($id);

     if (Auth::id() != $atividade->user_id) {
        abort(403, 'Acesso não autorizado');
    }
 
     $atividade->nome = $request->nome;
     $atividade->descricao = $request->descricao;
     $atividade->duracao = $request->duracao;
     $atividade->preco = $request->preco;
     $atividade->pontuacao = 0.0;

     if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('public/atividades');
        $atividade->link_foto = Storage::url($path);
    }
 
     $atividade->save();
 
     return redirect("/geriratividades");
 }

        //Eliminar uma atividade
        public function eliminarAtividade($id)
        {
            $atividade = Atividade::find($id);
            
            if (Auth::id() != $atividade->user_id) {
                abort(403, 'Acesso não autorizado');
            }
            $atividade->delete();
            return redirect('/geriratividades');
        }


     //Ver favoritos caso esteja logado
     public function gerirAtividades()
     {
         if (Auth::check()) {
                $user = Auth::user();
                $atividades = Atividade::where('user_id', Auth::id())->get();

             return view('gerir_atividades', compact('atividades'));
         }
         return redirect('/login')->with('error', 'Faça login para gerir as suas Atividades.');
     }


        
}
