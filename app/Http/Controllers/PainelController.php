<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Setor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PainelController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->cargo) {
            case 'adm':
                $usuarios = User::all()->count();

                $userData = User::select([
                    DB::raw('YEAR(created_at) as ano'),
                    DB::raw('COUNT(*) as total ')
                ])->groupBy('ano')->orderBy('ano', 'asc')->get();


                foreach ($userData as $user) {
                    $ano[] = $user->ano;
                    $total[] = $user->total;
                }

                $userLabel = "'Usuários por Ano'";
                $userAno = implode(',', $ano);
                $userTotal = implode(',', $total);

                $agendamentosPorSetor = Agendamento::select([
                    'IdSetor',
                    DB::raw('COUNT(*) as total')
                ])
                    ->where('status', 'C')
                    ->groupBy('IdSetor')
                    ->get();

                $labels = [];
                $valores = [];

                foreach ($agendamentosPorSetor as $agendamento) {
                    $setor = Setor::find($agendamento->IdSetor);
                    $labels[] = $setor->nome;
                    $valores[] = $agendamento->total;
                }

                $setoresNomes = $labels;

                return view('painel.painelAdm', compact('usuarios', 'userAno', 'userLabel', 'userTotal', 'setoresNomes', 'valores'));

            case 'prof':
                $usuarios = User::all()->count();

                $userData = User::select([
                    DB::raw('YEAR(created_at) as ano'),
                    DB::raw('COUNT(*) as total ')
                ])->groupBy('ano')->orderBy('ano', 'asc')->get();


                foreach ($userData as $user) {
                    $ano[] = $user->ano;
                    $total[] = $user->total;
                }

                $userLabel = "'Usuários por Ano'";
                $userAno = implode(',', $ano);
                $userTotal = implode(',', $total);

                $agendamentosPorSetor = Agendamento::select([
                    'IdSetor',
                    DB::raw('COUNT(*) as total')
                ])
                    ->where('status', 'C')
                    ->groupBy('IdSetor')
                    ->get();

                $labels = [];
                $valores = [];

                foreach ($agendamentosPorSetor as $agendamento) {
                    $setor = Setor::find($agendamento->IdSetor);
                    $labels[] = $setor->nome;
                    $valores[] = $agendamento->total;
                }

                $setoresNomes = $labels;

                return view('painel.painelOrientador', compact('usuarios', 'userAno', 'userLabel', 'userTotal', 'setoresNomes', 'valores'));

            case 'aluno':
                // Obtém o ID do usuário autenticado
                $idUsuario = auth()->user()->id;

                // Consulta no banco de dados para obter o número total de agendamentos por setor
                $agendamentosPorSetor = Agendamento::select([
                    'IdSetor',
                    DB::raw('COUNT(*) as total')
                ])
                    ->where('status', 'C')
                    ->where('idAluno', $idUsuario)
                    ->groupBy('IdSetor')
                    ->get();

                // Arrays para armazenar rótulos (labels) e valores
                $labels = [];
                $valores = [];

                // Itera sobre os agendamentos por setor
                foreach ($agendamentosPorSetor as $agendamento) {
                    // Encontra o setor correspondente
                    $setor = Setor::find($agendamento->IdSetor);

                    // Adiciona o nome do setor aos rótulos
                    $labels[] = $setor->nome;

                    // Adiciona o total de agendamentos ao array de valores
                    $valores[] = $agendamento->total;
                }

                // Armazena os nomes dos setores em uma variável separada
                $setoresNomes = $labels;

                // Retorna a view 'painel.painel' com os dados compactados para a view
                return view('painel.painel', compact('setoresNomes', 'valores'));
        }
    }
}
