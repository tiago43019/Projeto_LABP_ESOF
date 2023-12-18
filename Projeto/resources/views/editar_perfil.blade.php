<!-- editar-perfil.blade.php -->

@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Editar Perfil')

@section('content')

<div class="container-editar-perfil">
    <h2>Editar Perfil de {{ explode(' ', $user->name)[0] }}</h2>
    
    <form method="POST" action="{{ route('perfil.atualizar') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="name" value="{{ $user->name }}">
        </div>
        
        <!-- Adicione outros campos de formulário conforme necessário -->

        <button type="submit" id="salvarAlteracoesBtn">Salvar Alterações</button>
    </form>
</div>

@endsection
