<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    protected $redirectTo = '/login'; // Defina a rota para onde redirecionar após a redefinição de senha

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um endereço de email válido',
            'password.required' => 'O campo password é obrigatório',
            'password.confirmed' => 'As passwords não são iguais',
        ];
    }

    // Ajuste para aceitar um segundo parâmetro, $token
    protected function reset(Request $request, $token = null)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Ajuste na chamada para incluir o segundo parâmetro, $token
        $response = $this->broker()->reset(
            $this->credentials($request, $token),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return $this->sendResetResponse($response);
        }

        return $this->sendResetFailedResponse($request, $response);
    }

    protected function credentials(Request $request, $token)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
    }

    protected function sendResetResponse($response)
    {
        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    protected function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/layouts/login';
    }

    public function broker()
    {
        return Password::broker();
    }
}