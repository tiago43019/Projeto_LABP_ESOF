<!-- resources/views/home.blade.php -->

@extends('layouts.master')

@section('title', 'Mundo Em Rotas')

@section('content')
    <div><p style='margin-top: 3%;margin-bottom: 2%;'>Explorando destinos, criando memórias. Sua jornada começa aqui. Agência de viagens dedicada a tornar seus sonhos de viagem realidade. </p></div>
    <div class="gallery">
    @foreach($atividades as $atividade)
        <div class="item">
            <a href="/atividades/{{ $atividade->id }}">
                <img src="{{$atividade->link_foto}}" alt="{{ $atividade->nome }}">
            </a>
            <div class="info">
                <h4>{{ $atividade->nome }}</h4>
                <p>{{ $atividade->descricao }}</p>
                <p class="price">{{ $atividade->preco }}€</p>
            </div>
        </div>
    @endforeach
    </div>
    <div class="flex-container">
        <div class="pagination-container">
            {{ $atividades->links() }}
        </div>
    </div>
@endsection
