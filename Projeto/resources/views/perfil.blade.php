@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Perfil')

@section('content')

<div class="container-perfil">
    <h2>Perfil de {{ explode(' ', $user->name)[0] }}</h2>
    
    <form>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $user->name }}" disabled>
        </div>
        
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" disabled>
        </div>
        
        <div class="form-group">
            <label for="numero_telemovel">Número de Telemóvel:</label>
            <input type="tel" id="numero_telemovel" name="numero_telemovel" value="{{ $user->phone }}" disabled>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="********" disabled>
        </div>
    </form>

    <div class="button_editar_perfil">
        <a href="{{ route('editar_perfil') }}" id="editarPerfilBtn">Editar Perfil</a>
    </div>
</div>



@endsection
