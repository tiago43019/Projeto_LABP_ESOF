@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Criar Atividade')

@section('content')

<div class="container-editar-perfil">
    <h2 style="color: black;">Criar Atividade</h2>
    
    <form method="POST" action="/criaratividade" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ isset($atividade) ? $atividade->nome : '' }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea style="color: black;" name="descricao" id="descricao" value="{{ isset($atividade) ? $atividade->descricao : '' }}" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
        </div>
        <div class="form-group">
            <label for="duracao">Duração:</label>
            <input type="number" id="duracao" name="duracao" value="{{ isset($atividade) ? $atividade->duracao : '' }}">
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="decimal" id="preco" name="preco" value="{{ isset($atividade) ? $atividade->preco : '' }}">
        </div>
        
        <button type="submit" id="criarAtividadeBtn">Criar Atividade</button>
    </form>
</div>

@endsection
