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
        <div class="payment-form" id="card-element">
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


<!-- Certifique-se de incluir a biblioteca Stripe.js -->
<!-- Certifique-se de incluir a biblioteca Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var stripe = Stripe('{{ env("SUA_CHAVE_PUBLICA_DO_STRIPE") }}'); // Corrija para pegar a chave correta
        var elements = stripe.elements();

        // Crie o elemento do cartão
        var card = elements.create('card');
        card.mount('#card-element');

        // Capture o formulário de pagamento ao ser enviado
        $('form').on('submit', function (e) {
            e.preventDefault();

            // Use FormData para coletar dados do formulário
            var formData = new FormData(this);
            
            // Adicione o token do cartão ao FormData
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Exiba erros ao usuário, se houver algum
                    console.error(result.error.message);
                } else {
                    // Adicione o token do cartão ao FormData
                    formData.append('card_token', result.token.id);

                    // Envie os dados do formulário (incluindo o token do cartão) para o servidor
                    $.ajax({
                        url: '/purchase/' + $('input[name="atividade_id"]').val(),
                        type: 'POST',
                        data: formData,
                        processData: false,  // Não processar os dados
                        contentType: false,  // Não configurar o tipo de conteúdo
                        success: function (response) {
                            console.log('Resposta do servidor:', response);
                            // Aqui você pode redirecionar o usuário ou mostrar uma mensagem de sucesso
                        },
                        error: function (error) {
                            console.error('Erro ao enviar para o servidor:', error);
                            // Trate erros
                        }
                    });
                }
            });
        });
    });
</script>

@endsection
