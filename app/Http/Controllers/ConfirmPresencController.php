<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
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
