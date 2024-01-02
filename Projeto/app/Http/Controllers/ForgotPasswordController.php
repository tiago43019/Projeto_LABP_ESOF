<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    
    //Exibe formulario para solicitar o link de redefinição de senha.
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    //Envia o e-mail com o link de redefinição de senha.
    protected function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    //Valida o e-mail fornecido no formulario.
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    //Retorna o broker de redefinição de senha.
    public function broker()
    {
        return Password::broker();
    }

    //Resposta de sucesso ao enviar o link de redefinição de senha.
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    //Resposta de falha ao enviar o link de redefinição de senha.
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
}