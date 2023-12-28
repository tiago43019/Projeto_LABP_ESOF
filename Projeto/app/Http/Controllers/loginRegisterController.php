<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;





class loginRegisterController extends Controller
{

    public function processLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        // Autenticação bem-sucedida
        $user = Auth::user();

        // Verifica se o e-mail foi verificado
        if ($user->email_verified_at !== null) {
            // Verifica se o usuário é um administrador
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


    public function register(Request $request){
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
        else{
            // Redireciona para a página home se o usuário não estiver autenticado
            return redirect('/home');
        }
    }


        
    public function editarPerfil(){
        

        $user = Auth::user();


        return view('editar_perfil', compact('user'));
}


public function atualizarPerfil(Request $request){

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


