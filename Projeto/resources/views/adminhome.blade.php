@extends('layouts.master')

@section('title', 'Mundo Em Rotas (ADMIN)')

@section('content')
    <div class="titulo"><p style='margin-top: 3%;margin-bottom: 2%;'>Explorando destinos, criando memórias. A tua jornada começa aqui. <br> Agência de viagens dedicada a tornar seus sonhos de viagem realidade. </p></div>
    <div id="gallery" class="gallery">
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
            <div class="editar-atividade-btn">
                    <a href="/editaratividade/{{ $atividade->id }}">Editar Atividade</a>
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
