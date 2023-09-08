<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class ConfirmAgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::where('status', 'A')->get();
        return view('painel.agendamentos.confirmAgendamento', ['agendamentos' => $agendamentos]);
    }

    public function updateAprovado(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'status' => 'L',
        ];
        Agendamento::where('id', $id)->update($data);
        return redirect()->route('confirmAgendamentos-index');
    }

    public function updateRecusado(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'statusAluno' => 'C',
            'status' => 'R',
        ];
        Agendamento::where('id', $id)->update($data);
        return redirect()->route('confirmAgendamentos-index');
    }
}
