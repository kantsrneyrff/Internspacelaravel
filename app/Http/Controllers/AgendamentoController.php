<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendamentoRequest;
use App\Models\Agendamento;
use App\Models\Local;
use App\Models\Periodo;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    // Função vinda dos céus
    public function diasCheios()
    {

        $anoAtual = Carbon::now()->year;

        $diasCheios = DB::table('agendamentos')
            ->select(DB::raw('DATE(agendamentos.created_at) as date, agendamentos.idSetor, agendamentos.idPeriodo, setores.limite'))
            ->whereYear('agendamentos.created_at', $anoAtual)
            ->groupBy('data', 'agendamentos.idSetor', 'agendamentos.idPeriodo', 'setores.limite', 'agendamentos.created_at')
            ->havingRaw('COUNT(*) >= setores.limite')
            ->join('setores', 'agendamentos.idSetor', '=', 'setores.id')
            ->get();

        return $diasCheios;

    }



    public function create()
    {

        $diasCheios = $this->diasCheios();
        $locais = Local::all();
        $periodos = Periodo::all();
        $setores = Setor::all();

        return view('painel.agendamentos.create', [
            'locais' => $locais,
            'periodos' => $periodos,
            'setores' => $setores,
            'diasCheios' => $diasCheios,
        ]);
    }





    public function store(AgendamentoRequest $request)
    {
        $request->merge(['idAluno' => auth()->user()->id]);
        $request->merge(['status' => "A"]);
        $request->merge(['data' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('data'))))]);
        Agendamento::create($request->all());
        return redirect()->route('agendamentos-histAluno');
    }


    public function agendarCheio()
    {
        // Obtém todos os agendamentos com status "L"
        $agendamentos = Agendamento::where('statusAluno', 'L')->get();

        // Itera sobre os agendamentos
        foreach ($agendamentos as $agendamento) {
            // Obtém o local do agendamento
            $local = $agendamento->idLocal;

            // Obtém o setor do agendamento
            $setor = $agendamento->idSetor;

            // Obtém o período do agendamento
            $periodo = $agendamento->idPeriodo;

            // Verifica se o agendamento está dentro do limite de disponibilidade
            $limite = $this->getLimite($local, $setor, $periodo);
            if ($agendamento->qtd > $limite) {
                // Altera o status do agendamento para "R"
                $agendamento->statusAluno = 'R';
                $agendamento->save();
            }
        }
    }

    /**
     * Obtém o limite de disponibilidade de um agendamento.
     *
     * @param string $local
     * @param string $setor
     * @param string $periodo
     * @return int
     */
    private function getLimite(string $local, string $setor, string $periodo)
    {
        switch ($local) {
            case '11':
                switch ($setor) {
                    case '2':
                        switch ($periodo) {
                            case '3':
                                return 4;
                            case '1':
                                return 4;
                            case '2':
                                return 4;
                        }
                    case '4':
                        switch ($periodo) {
                            case '3':
                                return 4;
                            case '1':
                                return 4;
                            case '2':
                                return 4;
                        }
                    case '5':
                        switch ($periodo) {
                            case '3':
                                return 3;
                            case '1':
                                return 3;
                            case '2':
                                return 3;
                        }
                    case '3':
                        switch ($periodo) {
                            case '3':
                                return 2;
                            case '1':
                                return 2;
                            case '2':
                                return 2;
                        }
                }
            case '12':
                switch ($setor) {
                    case '1':
                        switch ($periodo) {
                            case '1':
                                return 2;
                            case '2':
                                return 2;
                        }
                    case '5':
                        switch ($periodo) {
                            case '1':
                                return 1;
                            case '2':
                                return 1;
                        }
                }
        }

        // Caso não encontre o local, setor ou período, retorna 0
        return 0;
    }



    public function listAgend()
    {
        $agendamentos = Agendamento::all();
        return view('painel.agendamentos.index', ['agendamentos' => $agendamentos]);
    }

}
