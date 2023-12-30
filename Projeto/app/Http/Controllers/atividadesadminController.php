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
    public function criarAtividade(Request $request)
    {
        $atividade = new Atividade();

        // Preenche os campos da atividade com os valores do request
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


    public function editarAtividade($id)
{
    // Busca a atividade específica pelo ID
    $atividade = Atividade::find($id);

    // Retorna a view para editar a atividade
    return view('editarAtividades', compact('atividade'));
}

public function atualizarAtividade(Request $request, $id)
{
    // Busca a atividade específica pelo ID
    $atividade = Atividade::find($id);

    // Atualiza os campos da atividade com os valores do request
    $atividade->nome = $request->nome;
    $atividade->descricao = $request->descricao;
    $atividade->link_foto = $request->link_foto;
    $atividade->duracao = $request->duracao;
    $atividade->preco = $request->preco;
    $atividade->pontuacao = $request->pontuacao;

    // Salva as alterações
    $atividade->save();

    // Redireciona de volta para a página da atividade
    return redirect("/adminhome");
}

}
