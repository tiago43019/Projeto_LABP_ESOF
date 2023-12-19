<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MundoEmRotasController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('/home');
    }

    public function perfil()
    {
        return view('/perfil');
    }

    public function login()
    {
        return view('layouts.login');
    }

    public function login_forget_password()
    {
        return view('layouts.login_forget_password');
    }

    public function atividade()
    {
        return view('atividade');
    }

    public function purchase()
    {
        return view('purchase');
    }

    public function reservas()
    {
        return view('reservas');
    }
}
