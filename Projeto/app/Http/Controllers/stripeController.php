<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Reserva;
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

    public function success(Request $request){

        $dados = session('dados');


        // Criar a reserva
        $reserva = new Reserva([
            'user_id' => auth()->user()->id,
            'atividade_id' => $dados['atividade_id'],
            'preco' => $dados['preco'] * $dados['quantidade'],
            'data' => $dados['data'],
            'duracao' => $dados['duracao'],
        ]);

        $reserva->save();

        // Redirecionar para uma página de confirmação ou similar
        return view('pagamentoConcluido', ['reservaId' => $reserva->id]);

    }

}
