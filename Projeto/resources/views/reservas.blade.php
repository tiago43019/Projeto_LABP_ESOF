@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Reservas')

@section('content')

<h2>Listagem de Reservas</h2>

<table class="reservations-table">
    <thead>
        <tr>
            <th>ID da Reserva</th>
            <th>Preço</th>
            <th>Data</th>
            <th>Duração (em minutos)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->preco }}</td>
                <td>{{ $reserva->data }}</td>
                <td>{{ $reserva->duracao }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="flex-container">
    <div class="pagination-container">
        {{ $reservas->links() }}

    </div>
</div>
@endsection