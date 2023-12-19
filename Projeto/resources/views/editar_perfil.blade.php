<!-- editar-perfil.blade.php -->

@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Editar Perfil')

@section('content')

<div class="container-editar-perfil">
    <h2>Perfil de {{ explode(' ', $user->name)[0] }}</h2>
    
    <form method="POST" action="{{ route('perfil.atualizar') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}">
        </div>
        <div class="form-group">
            <label for="numero_telemovel">Número de Telemóvel:</label>
            <input type="tel" id="numero_telemovel" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
        </div>
        
        
        <!-- Adicione outros campos de formulário conforme necessário -->

        <button type="submit" id="salvarAlteracoesBtn">Salvar Alterações</button>
    </form>
</div>

@endsection
