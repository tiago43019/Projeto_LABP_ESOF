<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    // Define a rota para onde redirecionar apos a redefinição de senha
    protected $redirectTo = '/login';

    // Exibe o formulario de redefinição de senha
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Regras de validação para o formulario de redefinição de senha
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    // Mensagens de erro personalizadas para as regras de validação
    protected function validationErrorMessages()
    {
        return [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um endereço de email válido',
            'password.required' => 'O campo password é obrigatório',
            'password.confirmed' => 'As passwords não são iguais',
        ];
    }

    // Processa a redefinição de senha
    protected function reset(Request $request, $token = null)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Executa a redefinição de senha
        $response = $this->broker()->reset(
            $this->credentials($request, $token),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // Verifica o resultado da redefinição e redireciona de acordo
        if ($response == Password::PASSWORD_RESET) {
            return $this->sendResetResponse($response);
        }

        return $this->sendResetFailedResponse($request, $response);
    }

    // Obtem as credenciais do formulário
    protected function credentials(Request $request, $token)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    // Realiza a redefinição efetiva da senha no banco de dados
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
    }

    // Redireciona apos uma redefinição bem-sucedida
    protected function sendResetResponse($response)
    {
        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }

    // Redireciona apos uma redefinição falhada
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    // Retorna o caminho para onde redirecionar
    protected function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/layouts/login';
    }

    // Retorna o broker de redefinição de senha
    public function broker()
    {
        return Password::broker();
    }
}
