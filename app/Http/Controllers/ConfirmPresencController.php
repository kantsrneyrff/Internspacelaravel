<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class ConfirmPresencController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('', ['agendamentos' => $agendamentos]);
    }
}
