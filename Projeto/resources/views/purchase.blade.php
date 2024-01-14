@extends('layouts.master')

@section('title', 'Compra de Bilhete')

@section('content')
    <div class="purchase-container">
        <h2>Compra de Bilhete</h2>

        <!-- Informações da atividade -->
        <div class="activity-info">
            <h3>Titulo: {{ $atividade->nome }}</h3>
            <p>Criado por: {{$atividade->user->name}}</p>
            <p>Descrição: {{ $atividade->descricao }}</p>
            <p>Preço por Bilhete: {{ $atividade->preco }}€</p>
            <p>Duração: {{ $atividade->duracao }} minutos</p>
        </div>

        <!-- Formulário de Compra -->
        <form method="POST" action="/checkout">
            @csrf
            <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
            <input type="hidden" name="nome" value="{{ $atividade->nome }}">
            <input type="hidden" name="preco" value="{{ $atividade->preco }}">
            <input type="hidden" name="duracao" value="{{ $atividade->duracao }}">
            
            <label for="agendamento" class="form-label">Horário:
            <select name="agendamento" id="agendamento" style="color: black;" onchange="updateDataValue()">
                @foreach($agendamentos as $agendamento)
                    <option value="{{ $agendamento->id }}" style='color: black;'>{{ $agendamento->horario }}</option>
                @endforeach
            </select>
            </label>

            <input type="hidden" id="data" name="data" value="">

            <label for="quantidade" class="form-label">Quantidade de Bilhetes:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-input" min="1" value="1" required>
            <br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="comprar-btn">Comprar</button>
        </form>
    </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    updateDataValue();
}, false);

function updateDataValue() {
    var selectedOption = document.getElementById('agendamento').selectedOptions[0].text;
    document.getElementById('data').value = selectedOption;
}
</script>
@endsection
