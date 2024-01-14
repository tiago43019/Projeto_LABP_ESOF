@extends('layouts.master')

@section('title', 'Pagamento Concluído')

@section('content')
    <div class="container">
        <div class="reservation-success">
            <h1>Reserva Concluída</h1>
            <p>A sua reserva foi concluída com sucesso. Obrigado por escolher Mundo em Rotas!</p>
            <div style='margin-top: 25px;'>
                <a href="{{ url('/download-recibo/' . $reservaId) }}" style='color: blue; margin-right: 20px; font-weight: bold;'>Download Recibo</a>
                <a href="/home" style='background-color: black; margin-left:20px; font-weight: bold;'>Voltar ao Início</a>
            </div>
        </div>
    </div>
@endsection
