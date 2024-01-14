@extends('layouts.master')

@section('title', $atividade->nome)

@section('content')
    <div class="content-section">
        <div class="atividade-info">
            <h2>{{ $atividade->nome }}</h2>
            <br>
            <p class="created-by">Criado por: {{ $atividade->user->name }}</p>
            <p class="description">{{ $atividade->descricao }}</p>
            <a href="{{ url('generate-pdf/' . $atividade->id) }}" class="pdf-link">Download PDF</a>
            <div class='buttonfav'>
                <button class="favorito-btn" data-atividade-id="{{ $atividade->id }}" onclick="toggleFavorito(this)">Adicionar aos Favoritos</button>
            </div>
        </div>
        <div class="slideshow-container">
            @for ($i = 1; $i <= 5; $i++)
                <div class="mySlides fade">
                    <div class="numbertext">{{ $i }} / 3</div>
                    <img src="{{asset($atividade->link_foto) . "?photo=" . $i }}" style="width:100%">
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
            
            <!-- comentario section -->
            <form id="comment-form" method="post" action="{{ url('/atividades/' . $atividade->id . '/comentarios') }}">
                @csrf
                <textarea id="comment-input" name="content" placeholder="Adicione um comentário..." required></textarea>
                <button type="submit" class="comment-button" style="background-color: #3490dc;">Comentar</button>
            </form>


            <!-- Lista de comentarios -->
            <ul id="comment-list" class="comment-list">
                @forelse($comentarios as $comentario)
                    <li class="comment-item">
                        <span class="comment-user">{{ $comentario->user->username }}:</span>
                        <span class="comment-content">{{ $comentario->content }}</span>
                    </li>
                @empty
                    <p class="no-comments">Ainda não há comentários. Seja o primeiro a comentar!</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
