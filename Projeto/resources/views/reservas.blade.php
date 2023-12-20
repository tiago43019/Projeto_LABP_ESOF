@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Reservas')

@section('content')

<h2>Listagem de Reservas</h2>

<table class="reservations-table">
    <thead>
        <tr>
            <th>ID da Reserva</th>
            <th>Preço</th>
            <th>Data de partida</th>
            <th>Duração</th>
            <th>Local</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->preco }}</td>
                <td>{{ $reserva->data_partida }}</td>
                <td>{{ $reserva->duracao }}</td>
                <td>{{ $reserva->local }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection