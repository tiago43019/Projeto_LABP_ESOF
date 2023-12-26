<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atividade;


class purchaseController extends Controller
{
    public function showPurchasePage($atividadeId)
    {
        $atividade = Atividade::findOrFail($atividadeId);
        return view('purchase', compact('atividade'));
    }

    public function processPurchase(Request $request)
    {
        $atividade = Atividade::findOrFail($request->atividade_id);
        $quantidade = $request->quantidade;
        $preco = $atividade->preco;
        $total = $quantidade * $preco;

        return view('paymentForm', compact('atividade', 'quantidade', 'preco', 'total'));
    }

}