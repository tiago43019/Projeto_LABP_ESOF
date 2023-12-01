@extends('layouts.master')

@section('title', 'Atividade 1')

@section('content')
<div class="content-section">
    <h2>Nome da Atividade</h2>
    <p>Descrição da Atividade</p>
    <div class='buttonfav'>
        <button class="favorito-btn" onclick="toggleFavorito(this)">Adicionar aos Favoritos</button>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
                <img src="/fotos/logo_png.png" style="width:100%">
            <div class="text">Caption Text</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
                <img src="/fotos/logo_png.png" style="width:100%">
            <div class="text">Caption Two</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
                <img src="/fotos/logo_png.png" style="width:100%">
            <div class="text">Caption Three</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
</div>
@endsection
