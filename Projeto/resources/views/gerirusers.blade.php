@extends('layouts.master')

@section('title', 'Mundo Em Rotas - Gerir Atividades')

@section('content')
    <table class="user-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Username</th>
                <th>Email</th>
                <th>Telemóvel</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->is_admin === 0)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <form method="POST" action="{{ route('gerirusersdelete', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
