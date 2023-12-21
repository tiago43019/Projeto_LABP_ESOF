<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;


class ReservaController extends Controller
{

    public function showReservas()
    {
        if (Auth::check()) {
            // Recupera o usuário autenticado
            $user = Auth::user();
            $reservas = Reserva::all(); // ou qualquer lógica para obter as reservas
            Paginator::useBootstrap();
            $reservas = Reserva::paginate(10);
            return view('reservas', compact('reservas'));
        }
        else{
            return redirect('/home');
        }
    }
}
