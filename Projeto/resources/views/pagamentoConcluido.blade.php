@extends('layouts.master')

@section('title', 'Pagamento Concluído')

@section('content')
    <div class="container">
        <div class="reservation-success">
            <h1>Reserva Concluída</h1>
            <p>A sua reserva foi concluída com sucesso. Obrigado por escolher Mundo em Rotas!</p>
            <a href="{{ url('/download-recibo/' . $reservaId) }}">Download Recibo</a>
            <a href="/home">Voltar ao Início</a>
        </div>
    </div>
@endsection
