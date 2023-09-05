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
}
