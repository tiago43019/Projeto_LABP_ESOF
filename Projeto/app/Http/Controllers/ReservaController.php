<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;


class ReservaController extends Controller
{

    //Mostra reservas
    public function showReservas()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $reservas = Reserva::all();
            Paginator::useBootstrap();
            $reservas = Reserva::paginate(10);
            return view('reservas', compact('reservas'));
        }
        else{
            return redirect('/home');
        }
    }
}
