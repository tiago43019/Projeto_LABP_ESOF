<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    // Metodo para mostrar o formulario de verificação
    public function show()
    {
        return view('auth.verify');
    }

    // Metodo para verificar o e-mail
    public function verify(Request $request, $id, $hash)
    {
        $user = \App\Models\User::find($id);
        $data = $user->getEmailForVerification();
        $hash = hash("sha256", $data);

     if (!$user || !hash_equals($hash, hash('sha256', $user->getEmailForVerification()))) {
        abort(404); // se user nao for encontrado ou token invalido
    }

    if ($user->hasVerifiedEmail()) {
        // User ja verificou o e-mail, redirecione conforme necessario
        return redirect('/login')->with('verified', true)->withErrors(['message' => 'A sua conta já se encontrava verificada.']);
    }

    $user->markEmailAsVerified();

    event(new Verified($user));

    return redirect('/login')->with('verified', true)->with(['message' => 'A sua conta foi verificada com sucesso.']);
    }

    // Método para reenviar o e-mail de verificação
    public function resend(Request $request)
    {
        return back()->with('resent', true);
    }
}
