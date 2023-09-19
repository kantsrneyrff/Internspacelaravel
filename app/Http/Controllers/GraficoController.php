<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\User;
use Illuminate\Http\Request;


class GraficoController extends Controller
{

    public function grafico()
    {
        $agendamento = Agendamento::all();

        $AgenLabel = $agendamento->pluck('setor');

        $AgenTotal = $agendamento->pluck('setor.nome', 'count');

        return view('painel.painelAdm', compact('AgenLabel', 'AgenTotal'));
    }
}