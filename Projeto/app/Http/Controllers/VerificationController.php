<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    // Método para mostrar o formulário de verificação
    public function show()
    {
        return view('auth.verify');
    }

    // Método para verificar o e-mail
    public function verify(Request $request, $id, $hash)
    {
        $user = \App\Models\User::find($id);

    if (!$user || !hash_equals($hash, sha1($user->getEmailForVerification()))) {
        abort(404); // Usuário não encontrado ou token inválido
    }

    if ($user->hasVerifiedEmail()) {
        // Usuário já verificou o e-mail, redirecione conforme necessário
        return redirect('/login')->with('verified', true)->withErrors(['message' => 'A sua conta já se encontrava verificada.']);
    }

    $user->markEmailAsVerified();

    event(new Verified($user));

    return redirect('/login')->with('verified', true)->with(['message' => 'A sua conta foi verificada com sucesso.']);
    }

    // Método para reenviar o e-mail de verificação
    public function resend(Request $request)
    {
        // Lógica para reenviar o e-mail de verificação

        return back()->with('resent', true);
    }
}
