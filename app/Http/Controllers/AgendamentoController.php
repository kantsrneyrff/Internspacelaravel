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
    
    public function gerarDiasCheios(AgendamentoRequest $request){

       
    // Validar os dados do agendamento
    $this->validate($request, [
        'data' => 'required|date',
        'idPeriodo' => 'required|string',
        'idSetor' => 'required|integer',
    ]);

    // Obter os dias bloqueados
    $diasBloqueados = [];
    $agendamentos = Agendamento::where('data', $request->data)
        ->where('idPeriodo', $request->nome)
        ->get();
    foreach ($agendamentos as $agendamento) {
        $diasBoqueados[] = $agendamento->data;
    }

    // Verificar se o horário está disponível
    $setor = Setor::find($request->idSetor);
    $vagas_disponiveis = $setor->limite;
    $totalAgendamentos = Agendamento::where('data', $request->data)
        ->where('idPeriodo', $request->nome)
        ->where('idSetor', $request->idSetor)
        ->count();

    if ($totalAgendamentos >= $vagas_disponiveis || in_array($request->data, $diasBoqueados)) {
        // O horário está ocupado
        return response()->json([
            'status' => 'erro',
            'mensagem' => 'O horário está ocupado',
        ]);
    }

    dd($diasBloqueados);
}

    // // O horário está disponível
    // $agendamento = new Agendamento();
    // $agendamento->data = $request->data;
    // $agendamento->hora = $request->hora;
    // $agendamento->aluno_id = $request->aluno_id;
    // $agendamento->setor_id = $request->setor_id;
    // $agendamento->save();

    // return response()->json([
    //     'status' => 'sucesso',
    //     'mensagem' => 'Agendamento realizado com sucesso',
    // ]);


 

    public function listAgend(){
        $agendamentos = Agendamento::all();
        return view('painel.agendamentos.index', ['agendamentos' => $agendamentos]);
    }
    
}
