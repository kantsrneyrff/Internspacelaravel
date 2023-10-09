<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Horas;
use Illuminate\Http\Request;


class ConfirmPresencController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::where('status','L' )->get();
        return view('painel.confirmPresenca.index', ['agendamentos' => $agendamentos]);
    }
    public function updatePresente(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'statusAluno' => 'P',
            'status' => 'C',
        ];
        Agendamento::where('id', $id)->update($data);

        $agendamento = Agendamento::where('id', $id)->first();
        if ($agendamento->idPeriodo == "3") {
            $dataHoras = [
                'horas' => '8:00:00',
                'idAluno' => auth()->user()->id,
                'idSetor' => $agendamento->idSetor,
                'idPeriodo' => $agendamento->idPeriodo,
                'idLocal' => $agendamento->idLocal,
            ];
        } else {
            $dataHoras = [
                'horas' => '4:00:00',
                'idAluno' => auth()->user()->id,
                'idSetor' => $agendamento->idSetor,
                'idPeriodo' => $agendamento->idPeriodo,
                'idLocal' => $agendamento->idLocal,
            ];
        }
        Horas::create($dataHoras);
        return redirect()->route('confirmPresenca-index');
    }

    public function updateAusente(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'statusAluno' => 'A',
            'status' => 'C',
            
        ];
        Agendamento::where('id', $id)->update($data);
        return redirect()->route('confirmPresenca-index');
    }
}
