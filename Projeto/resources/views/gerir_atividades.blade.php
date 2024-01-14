@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Gerir Atividades')

@section('content')
    <div class="titulo">
        <p style='margin-top: 3%; margin-bottom: 2%;'>As minhas Atividades:</p>
    </div>
    
    <div class="gallery">
        @if($atividades->isEmpty())
            <p class="empty">Não criaste nenhuma Atividade ainda.</p>
        @else 
            @foreach($atividades as $atividade)
                <div class="item">
                    <a href="/atividades/{{ $atividade->id }}">
                        <img src="{{ $atividade->link_foto }}" alt="{{ $atividade->nome }}">
                    </a>
                    <div class="info">
                        <h4>{{ $atividade->nome }}</h4>
                        <p>{{ $atividade->descricao }}</p>
                        <p class="price">{{ $atividade->preco }}€</p>
                    </div>
                    <div class="actions">
                        <a href="/editaratividade/{{ $atividade->id }}" class="edit-btn">Editar</a>
                        <form action="/atividades/{{ $atividade->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja eliminar esta atividade?');" class="delete-btn">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    
    <div class="flex-container">
        <div class="pagination-container">
        </div>
    </div>
@endsection
