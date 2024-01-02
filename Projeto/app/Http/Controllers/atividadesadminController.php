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

    //Redireciona para pagina da atividade com seus dados e comentarios

    public function showAtividade($id)
    {
        $atividade = Atividade::find($id);

        return view('atividade', compact('atividade'));
    }

    //Permite criar uma atividade (ADMIN)
    public function criarAtividade(Request $request)
    {
        $atividade = new Atividade();

        $atividade->nome = $request->nome;
        $atividade->descricao = $request->descricao;
        $atividade->link_foto = $request->link_foto;
        $atividade->duracao = $request->duracao;
        $atividade->preco = $request->preco;
        $atividade->pontuacao = $request->pontuacao;
        $atividade->created_at = now();

        $atividade->save();
    

        return redirect('/criaratividade');

    }


    //Ao clicar no botao editar atividade redireciona para a view com a atividade certa
    public function editarAtividade($id)
{
    $atividade = Atividade::find($id);

    return view('editarAtividades', compact('atividade'));
}

//Editar uma atividade já criada (ADMIN)
public function atualizarAtividade(Request $request, $id)
{
    $atividade = Atividade::find($id);

    $atividade->nome = $request->nome;
    $atividade->descricao = $request->descricao;
    $atividade->link_foto = $request->link_foto;
    $atividade->duracao = $request->duracao;
    $atividade->preco = $request->preco;
    $atividade->pontuacao = $request->pontuacao;

    $atividade->save();

    return redirect("/adminhome");
}

}
