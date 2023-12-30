<!-- editarAtividade.blade.php -->

@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Editar Atividade')

@section('content')
    <div class="container-editar-perfil">
        <h2 style="color: black;">Editar Atividade</h2>
        
        <form method="POST" action="{{ url('/atualizaratividade/'.$atividade->id) }}">
            @csrf
            @method('POST') <!-- Adicione esta linha para indicar que é um método POST -->

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ isset($atividade) ? $atividade->nome : '' }}">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea style="color: black;" name="descricao" id="descricao"  cols="30" rows="10">{{ isset($atividade) ? $atividade->descricao : '' }}</textarea>>
            </div>

            <div class="form-group">
                <label for="link_foto">Foto(link):</label>
                <input type="text" id="link_foto" name="link_foto" value="{{ isset($atividade) ? $atividade->link_foto : '' }}">
            </div>

            <div class="form-group">
                <label for="duracao">Duração:</label>
                <input type="number" id="duracao" name="duracao" value="{{ isset($atividade) ? $atividade->duracao : '' }}">
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="decimal" id="preco" name="preco" value="{{ isset($atividade) ? $atividade->preco : '' }}">
            </div>

            <div class="form-group">
                <label for="pontuacao">Pontuação:</label>
                <input type="decimal" id="pontuacao" name="pontuacao" value="{{ isset($atividade) ? $atividade->pontuacao : '' }}">
            </div>
            
            <!-- Adicione outros campos de formulário conforme necessário -->
        
            <button type="submit" id="editarAtividadeBtn">Salvar Alterações</button>
        </form>
    </div>
@endsection
