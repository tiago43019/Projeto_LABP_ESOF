<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class loginRegisterController extends Controller
{

    public function processLogin(Request $request){
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            $user = Auth::user();
            return redirect('/home');
        } else{
            return redirect('/login')->withErrors(['message' => 'Username ou Password incorretos']);
        }
    }

    public function register(Request $request){
        $user = new User();
        $user->name = $request->nome_completo;
        $user->username = $request->username;
        $user->phone = $request->numero_telemovel;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = now();
        $user->save();
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/home');
    }

    public function perfil()
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Recupera o usuário autenticado
            $user = Auth::user();

            // Passa os dados do usuário para a view
            return view('perfil', ['user' => $user]);
        }

        // Redireciona para a página de login se o usuário não estiver autenticado
        return redirect('/login');
    }


        
}


