<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atividade;
use Illuminate\Http\Request;

class stripeController extends Controller
{
    public function purchase($atividadeId) {

        //Redireciona para a pagina de compras da atividade certa
        $atividade = Atividade::with('agendamentos')->findOrFail($atividadeId);
        $agendamentos = $atividade->agendamentos;
        return view('purchase', compact('atividade', 'agendamentos'));


    }

    public function checkout(Request $request){
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    
        $paymentMethodId = $request->input('payment_method');
        $atividadeId = $request->input('atividade_id');
        $atividade = Atividade::findOrFail($atividadeId);
    
        // Calcule o total baseado na quantidade de bilhetes e preço
        $amount = $atividade->preco * 100 * $request->input('quantidade'); // em centavos
    
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd',
            'payment_method' => $paymentMethodId,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);
    
        // Aqui você pode verificar se o pagamento foi bem-sucedido e responder adequadamente
        if ($paymentIntent->status == 'succeeded') {
            // Trate o sucesso do pagamento aqui
            return redirect()->route('success');
        } else {
            // Trate falhas aqui
            return redirect()->route('purchase', ['atividadeId' => $atividadeId])->withErrors('O pagamento falhou.');
        }
    }


    public function success(){

        return view('success');

    }

}
