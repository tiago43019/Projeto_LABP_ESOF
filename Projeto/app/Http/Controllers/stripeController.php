<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Atividade;
use Illuminate\Http\Request;

class stripeController extends Controller
{
    // retorna a view de compra com os respetivos horarios disponiveis
    public function purchase($atividadeId) {

        $atividade = Atividade::with('agendamentos')->findOrFail($atividadeId);
        $agendamentos = $atividade->agendamentos;
        return view('purchase', compact('atividade', 'agendamentos'));
    }

    // Checkout
    public function checkout(Request $request){

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        

        $nome = $request->input('nome');
        $preco = $request->input('preco');
        $quantidade = $request->input('quantidade'); 
        $data = $request->input('data');     

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $nome,
                    ],
                    'unit_amount' => $preco * 100,
                ],
                'quantity' => $quantidade,
            ],
        ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => url('/purchase'),
            'customer_email' => auth()->user()->email,
        ]);

        // Guardar os dados da reserva na sessão para depoois serem usados no success para guardar na base de dados
        $request->session()->put('dados', 
            [
                'atividade_id' => $request->input('atividade_id'),
                'preco' => $preco,
                'quantidade' => $quantidade,
                'agendamento_id' => $request->input('agendamento'),
                'duracao' => $request->input('duracao'),
                'data' => $data,

            ]
        );

        return redirect()->away($session->url);
    
    }

    // Após sucesso do pagamento
    public function success(Request $request){

        $dados = session('dados');

        // Guardar a reserva na base de dados
        $reserva = new Reserva([
            'user_id' => auth()->user()->id,
            'atividade_id' => $dados['atividade_id'],
            'preco' => $dados['preco'] * $dados['quantidade'],
            'data' => $dados['data'],
            'duracao' => $dados['duracao'],
        ]);

        $reserva->save();

        return view('pagamentoConcluido', ['reservaId' => $reserva->id]);

    }

}
