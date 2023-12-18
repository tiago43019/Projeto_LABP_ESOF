@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Perfil')

@section('content')

<div class="container-perfil">

    <div>
        <img class="imagem_perfil" src="/fotos/paris1.jpeg" alt="Foto Perfil">
    </div>

    <form>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="Nome" disabled>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="Username" disabled>
        <br>
        <label for="numero_telemovel">Número de Telemóvel:</label>
        <input type="tel" id="numero_telemovel" name="numero_telemovel" value="numero_telemovel" disabled>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="email" disabled>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="password" disabled>

    </form>

</div>

@endsection

