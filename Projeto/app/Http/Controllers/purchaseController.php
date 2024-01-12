<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Exception\ApiErrorException;

class purchaseController extends Controller
{
    //Redireciona para a pagina de compras da atividade certa
    public function showPurchasePage($atividadeId)
    {
        $atividade = Atividade::with('agendamentos')->findOrFail($atividadeId);
        $agendamentos = $atividade->agendamentos;
        return view('purchase', compact('atividade', 'agendamentos'));
    }
    
    public function processPayment(Request $request)
    {
        $validatedData = $request->validate([
            'card_holder_name' => 'required',
            'card_number' => 'required|numeric',
            'card_expiry' => 'required',
            'card_cvc' => 'required|numeric',
            'atividade_id' => 'required|numeric',
            'quantidade' => 'required|numeric'
        ]);

        $atividade = Atividade::findOrFail($validatedData['atividade_id']);
        $total = $atividade->preco * $validatedData['quantidade'];

        Stripe::setApiKey(env('STRIPE_SK'));

        try {
            // Criar um PaymentMethod
            $paymentMethod = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => $validatedData['card_number'],
                    'exp_month' => (int)substr($request->card_expiry, 5, 2),
                    'exp_year' => (int)substr($request->card_expiry, 0, 4),
                    'cvc' => $validatedData['card_cvc'],
                ],
            ]);

            // Confirmar o PaymentIntent com o PaymentMethod criado
            $paymentIntent = PaymentIntent::create([
                'amount' => $total * 100, // Multiplica por 100 para converter em centavos
                'currency' => 'usd',
                'payment_method' => $paymentMethod->id,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            // Verificar o status do PaymentIntent
            if ($paymentIntent->status === 'succeeded') {
                // Processamento adicional, como atualizar o banco de dados, pode ser feito aqui
                return response()->json(['success' => 'Payment succeeded', 'paymentIntent' => $paymentIntent]);
            }

            return response()->json(['error' => 'PaymentIntent not succeeded', 'paymentIntent' => $paymentIntent]);
        } catch (ApiErrorException $e) {
            // Capturar erros da API do Stripe e retornar uma resposta adequada
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
