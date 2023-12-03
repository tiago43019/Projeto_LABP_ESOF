@extends('layouts.master')

@section('title', 'Atividade 1')

@section('content')
    <div class="purchase-container">
        <h2>Compra de Bilhete</h2>

        <!-- Informações da Atividade -->
        <div class="activity-info">
            <h3>Nome da Atividade</h3>
            <p>Descrição da Atividade</p>
            <p>Data e Horário: 01/01/2023, 10:00</p>
            <p>Preço por Bilhete: $100</p>
        </div>

        <!-- Formulário de Compra -->
        <form action="/processar_compra" method="post" class="purchase-form">
            @csrf
            <label for="quantidade" class="form-label">Quantidade de Bilhetes:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-input" min="1" value="1" required>
            <br>
            <!-- Adicione mais campos conforme necessário -->

            <button type="submit" class="comprar-btn">Comprar Bilhete</button>
        </form>
    </div>
@endsection
