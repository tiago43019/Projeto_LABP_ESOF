<!-- resources/views/favoritos.blade.php -->

@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Favoritos')

@section('content')
    <div class="titulo">
        <p style='margin-top: 3%; margin-bottom: 2%;'>Atividades Favoritas</p>
    </div>
    
    <div id="gallery" class="gallery">
        @if($favoritos->isEmpty())
            <p class="empty">Não tens atividades favoritas.</p>
        @else 
            @foreach($favoritos as $atividade)
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
        @endif
    </div>
    
    <div class="flex-container">
        <div class="pagination-container">
            <!-- Adicione paginação, se necessário -->
        </div>
    </div>
@endsection
