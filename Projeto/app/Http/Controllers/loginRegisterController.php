<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginRegisterController extends Controller
{
    // Processa a tentativa de login do user
    public function processLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->email_verified_at !== null) {
                if ($user->is_admin) {
                    return redirect('/adminhome');
                } else {
                    return redirect('/home');
                }
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['message' => 'Para puder fazer login, verifique o seu email.']);
            }
        } else {
            return redirect('/login')->withErrors(['message' => 'Username ou Password incorretos']);
        }
    }

    // Registra um novo user no sistema
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->nome_completo;
        $user->username = $request->username;
        $user->is_admin = 0;
        $user->phone = $request->numero_telemovel;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = now();
        $user->save();

        $user->sendEmailVerificationNotification();

        return redirect('/login')->with('message', 'Verifique o seu email para ativar a sua conta.');
    }

    // Realiza o logout do user
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }

    // Exibe o perfil do user autenticado.
    public function perfil()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('perfil', ['user' => $user]);
        } else {
            return redirect('/home');
        }
    }

    // Exibe o formulario para editar o perfil do user
    public function editarPerfil()
    {
        $user = Auth::user();
        return view('editar_perfil', compact('user'));
    }

    // Atualiza as informações do perfil do user.
    public function atualizarPerfil(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->updated_at = now();

        if ($user instanceof User) {
            $user->save();
        }

        return redirect('/perfil');
    }
}
