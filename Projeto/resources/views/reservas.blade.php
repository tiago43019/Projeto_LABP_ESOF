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
        <th>Data de chegada</th>
        <th>Local</th>
      </tr>
    </thead>
    <tbody>
      <!-- Exemplo de dados, substitua com suas próprias informações -->
      <tr>
        <td>1</td>
        <td>100</td>
        <td>2023-01-01 11:59</td>
        <td>2023-01-01 18:23</td>
        <td>Londres</td>
      </tr>
      <tr>
        <td>2</td>
        <td>120</td>
        <td>2023-02-10 09:35</td>
        <td>2023-02-10 19:21</td>
        <td>Paris</td>
      </tr>
      <!-- Adicione mais linhas conforme necessário -->
    </tbody>
  </table>

@endsection