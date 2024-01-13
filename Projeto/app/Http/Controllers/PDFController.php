<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\Reserva;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id){
        $atividade = Atividade::findOrFail($id);

        $data = [
            'title' => $atividade->nome,
            'user' => $atividade->user->name,
            'descricao' => $atividade->descricao,
            'preco' => $atividade->preco,
            'data' => date('d/m/Y')
            // Adicione outros campos necessários
        ];

        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download($atividade->nome . '-info.pdf');
    }

    public function downloadRecibo($reservaId)
    {
        $reserva = Reserva::findOrFail($reservaId);
        $atividade = Atividade::findOrFail($reserva->atividade_id);
        $user = User::findOrFail($reserva->user_id);
        // Prepare os dados para o PDF, como detalhes da reserva e pagamento
       
        $data = [
            'title' => $atividade->nome,
            'descricao' => $atividade->descricao,
            'preco' => $reserva->preco,
            'quantidade' => $reserva->preco / $atividade->preco,
            'duracao' => $reserva->duracao,
            'dataReserva' => $reserva->data,

            'user' => $user->name,
            'email' => $user->email,
            'telefone' => $user->phone,

            'data' => date('d/m/Y')
        ];
        

        $pdf = PDF::loadView('reciboPDF', $data);
        return $pdf->download('recibo.pdf');
    }
}
