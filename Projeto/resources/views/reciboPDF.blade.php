<!DOCTYPE html>
<html>
<head>
    <title>Recibo da Reserva</title>
</head>
<body>
    <h1>Recibo da Reserva</h1>
    <p>Atividade: {{$title}}</p>
    <p>Descrição: {{$descricao}}</p>
    <p>Preço: {{$preco}}€</p>
    <p>Número de Bilhetes: {{$quantidade}}</p>
    <p>Duração: {{$duracao}} minutos</p>
    <p>Data: {{$dataReserva}}</p>
    

    <h1>Dados da Fatura:</h1>
    <p>Nome: {{$user}}</p>
    <p>Email: {{$email}}</p>
    <p>Telefone: {{$telefone}}</p>

    <h2>Método Pagamento:</h2>
    <p>Cartão de Débito/Crédito</p>
    <p>PDF gerado: {{ $data }}</p>

</body>
</html>
