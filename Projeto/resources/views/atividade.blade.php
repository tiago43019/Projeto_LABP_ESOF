@extends('layouts.master')

@section('title', 'Atividade 1')

@section('content')
<div class="content-section">
    <h2>Paris, França</h2>
    <p class="description">
        Paris, a cidade da luz, encanta com sua elegância e charme atemporais. Da icônica Torre Eiffel aos Champs-Élysées, cada rua respira história e cultura. Paris é uma experiência única, onde a tradição se entrelaça com a modernidade, criando um cenário cativante para todos os que a visitam.
    </p>
    <div class='buttonfav'>
        <button class="favorito-btn" onclick="toggleFavorito(this)">Adicionar aos Favoritos</button>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
                <img src="/fotos/paris1.jpeg" style="width:100%">
            <div class="text">Torre Eiffel</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
                <img src="/fotos/paris2.jpeg" style="width:100%">
            <div class="text">Pirâmide do Louvre</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
                <img src="/fotos/paris3.jpeg" style="width:100%">
            <div class="text">Arco do Triunfo</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    <br>
    <div class="preco-carrinho">
        <div class="preco">
            <p>Preço por pessoa:</p>
            <p style='font-weight: bold; color: black;'>100€</p>
        </div>
        <div class="adicionar-carrinho">
            <button class="adicionar-carrinho-btn"><a href="/purchase">Comprar Bilhete</a></button>
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
