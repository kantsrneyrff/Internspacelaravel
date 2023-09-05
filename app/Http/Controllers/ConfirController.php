<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirController extends Controller
{
    public function aprovAgend()
    {
        $agendamentos = Agendamento::where('idAluno', auth()->user()->id)->get();
        return view('painel.painel', ['agendamentos' => $agendamentos]);
    }

}
