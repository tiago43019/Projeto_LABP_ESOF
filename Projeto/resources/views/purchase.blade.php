@extends('layouts.master')

@section('title', 'Compra de Bilhete')

@section('content')
    <div class="purchase-container">
        <h2>Compra de Bilhete</h2>

        <!-- Informações da atividade -->
        <div class="activity-info">
            <h3>{{ $atividade->nome }}</h3>
            <p>{{ $atividade->descricao }}</p>
            <p>Preço por Bilhete: ${{ $atividade->preco }}</p>
        </div>

        <!-- Formulario de compra -->
        <form action="/pagamento/{{$atividade->id}}" method="post" class="purchase-form">
            @csrf
            <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
            <select name="agendamento" id="agendamento">
                <option value="1">serfef</option>
                <option value="2">erverveer</option>
            </select>
            <label for="quantidade" class="form-label" style="color: white;">Quantidade de Bilhetes:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-input" min="1" value="1" required>
            <br>
            <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
            <button type="submit" class="adicionar-carrinho-btn">Comprar</button>
        </form>
    </div>
@endsection
