<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendamentoRequest;
use App\Models\Agendamento;
use App\Models\Local;
use App\Models\Periodo;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('painel.agendamentos.index', ['agendamentos' => $agendamentos]);
    }

    public function histAluno()
    {
        $agendamentos = Agendamento::where('idAluno', auth()->user()->id)->get();
        return view('painel.agendamentos.historicoAluno', ['agendamentos' => $agendamentos]);
    }


    public function create()
    {
        $locais = Local::all();
        $periodos = Periodo::all();
        $setores = Setor::all();
        return view('painel.agendamentos.create', ['locais' => $locais, 'periodos' => $periodos, 'setores' => $setores]);
    }
    
    public function store(AgendamentoRequest $request)
    {
        $request->merge(['idAluno' => auth()->user()->id]);
        $request->merge(['status' => "A"]);
        $request->merge(['data' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('data'))))]);
        Agendamento::create($request->all());
        return redirect()->route('agendamentos-histAluno');
    }
    
    public function gerarDiasCheios(){
        
    }

    public function listAgend(){
        $agendamentos = Agendamento::all();
        return view('painel.agendamentos.index', ['agendamentos' => $agendamentos]);
    }
    
}
