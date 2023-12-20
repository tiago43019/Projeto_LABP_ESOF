<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;


class ReservaController extends Controller
{

    public function showReservas()
    {
        if (Auth::check()) {
            // Recupera o usuário autenticado
            $user = Auth::user();
            $reservas = Reserva::all(); // ou qualquer lógica para obter as reservas
            return view('reservas', compact('reservas'));
        }
        else{
            return redirect('/home');
        }
    }
}
