<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class favoritosController extends Controller
{
    public function favoritos()
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Obtém as atividades favoritas do usuário
            $favoritos = $user->favoritos;

            // Retorna a view com as atividades favoritas
            return view('favoritos', compact('favoritos'));
        }

        // Se o usuário não estiver autenticado, redireciona para a página de login
        return redirect('/login')->with('error', 'Faça login para ver seus favoritos.');
    }
}
