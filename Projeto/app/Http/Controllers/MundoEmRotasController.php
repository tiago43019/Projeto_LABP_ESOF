<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class MundoEmRotasController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function adminhome()
    {  
        return view('/adminhome');
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

    public function criaratividade()
    {
        return view('criaratividade');
    }    
    
    public function gerirusers(){
        return view('gerirusers');
    }
}
