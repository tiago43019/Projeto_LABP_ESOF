@extends('layouts.master')

@section('title', $atividade->nome)

@section('content')
<div class="content-section">
    <h2>{{ $atividade->nome }}</h2>
    <p class="description">{{ $atividade->descricao }}</p>
    <div class='buttonfav'>
        <button class="favorito-btn" onclick="toggleFavorito(this)">Adicionar aos Favoritos</button>
    </div>
    <div class="slideshow-container">
        @for ($i = 1; $i <= 5; $i++)
            <div class="mySlides fade">
                <div class="numbertext">{{ $i }} / 3</div>
                <img src="{{ $atividade->link_foto . "?photo=" . $i }}" style="width:100%">
            </div>
        @endfor
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <div style="text-align:center">
        @for ($i = 1; $i <= 5; $i++)
            <span class="dot" onclick="currentSlide({{ $i }})"></span> 
        @endfor
    </div>
    <br>
    <div class="preco-carrinho">
        <div class="preco">
            <p>Preço por pessoa:</p>
            <p style='font-weight: bold; color: black;'>{{ $atividade->preco }}€</p>
        </div>
        <div class="adicionar-carrinho">
            <button class="adicionar-carrinho-btn"><a href="/purchase/{{$atividade->id}}">Comprar Bilhete</a></button>
        </div>
    </div>
    <div class="comment-section">
        <h3>Comentários</h3>
        
        <!-- Formulário para adicionar um novo comentário -->
        <form id="comment-form">
            <textarea id="comment-input" placeholder="Adicione um comentário..." required></textarea>
            <button class="comment-button" style="background-color: rgba(245, 245, 245, 0.555);">Comentar</button>
        </form>

        <!-- Lista de comentários existentes -->
        <ul id="comment-list">
            <!-- Os comentários serão adicionados dinamicamente aqui -->
        </ul>
    </div>
</div>
@endsection
