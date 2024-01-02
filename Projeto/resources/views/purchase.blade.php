@extends('layouts.master')

@section('title', 'Compra de Bilhete')

@section('content')
    <div class="purchase-container">
        <h2>Compra de Bilhete</h2>

        <!-- Informações da atividade -->
        <div class="activity-info">
            <h3>{{ $atividade->nome }}</h3>
            <p>{{ $atividade->descricao }}</p>
            <p>Data e Horário: {{ $atividade->data_horario }}</p>
            <p>Preço por Bilhete: ${{ $atividade->preco }}</p>
        </div>

        <!-- Formulario de compra -->
        <form action="/carrinho/adicionar" method="post" class="purchase-form">
            @csrf
            <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
            <label for="quantidade" class="form-label" style="color: white;">Quantidade de Bilhetes:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-input" min="1" value="1" required>
            <br>
            <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
            <button type="submit" class="btn-add-to-cart">Adicionar ao Carrinho</button>
        </form>
    </div>
@endsection
