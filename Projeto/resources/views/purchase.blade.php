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
            <p>Preço por Bilhete: ${{ $atividade->preco }}</p>
            <p>Duração: {{ $atividade->duracao }} minutos</p>
        </div>

        <!-- Formulário de Pagamento (a ser integrado com Stripe) -->
        <div class="payment-form">
            <h3>Informações de Pagamento</h3>
            <label for="card-holder-name">Nome no Cartão:</label>
            <input type="text" id="card-holder-name" name="card_holder_name" required>

            <label for="card-number">Número do Cartão:</label>
            <input type="text" id="card-number" name="card_number" required>

            <label for="card-expiry">Data de Expiração:</label>
            <input type="month" id="card-expiry" name="card_expiry" required>

            <label for="card-cvc">CVC:</label>
            <input type="number" id="card-cvc" name="card_cvc" required>
        </div>

        <!-- Formulário de Compra -->
        <form method="post">
            @csrf
            <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">
            
            <label for="agendamento" class="form-label">Horário:
            <select name="agendamento" id="agendamento" style="color: black;">
                @foreach($agendamentos as $agendamento)
                <option value="{{ $agendamento->id }}">{{ $agendamento->horario }}</option>
                @endforeach
            </select>
            </label>

            <label for="quantidade" class="form-label">Quantidade de Bilhetes:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-input" min="1" value="1" required>
            <br>

            <button type="submit" class="comprar-btn">Comprar</button>
        </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();

        // Obtenha o valor do ID da atividade
        var atividadeId = $('input[name="atividade_id"]').val();
        console.log("Atividade ID: ", atividadeId);


        var dados = {
            _token: "{{ csrf_token() }}",
            card_holder_name: $('#card-holder-name').val(),
            card_number: $('#card-number').val(),
            card_expiry: $('#card-expiry').val(),
            card_cvc: $('#card-cvc').val(),
            atividade_id: $('input[name="atividade_id"]').val(),
            quantidade: $('#quantidade').val()
            // Inclua outros campos do formulário conforme necessário
        };

        $.ajax({
            url: '/purchase/' + $('input[name="atividade_id"]').val(),
            type: 'POST',
            data: dados,
            success: function(response) {
                console.log(response);
                // Aqui você pode redirecionar o usuário ou mostrar uma mensagem de sucesso
            },
            error: function(error) {
                console.log(error);
                // Tratar erros
            }
        });
    });
});
</script>

@endsection
