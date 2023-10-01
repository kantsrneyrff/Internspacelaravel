<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use COM;
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
                    ->where('status', 'C') // Aqui é onde você aplica a condição 'status = C'
                    ->groupBy('IdSetor')
                    ->get();

                $labels = [];
                $valores = [];

                foreach ($agendamentosPorSetor as $agendamento) {
                    $setor = Setor::find($agendamento->IdSetor);
                    $labels[] = $setor->nome; // Substitua 'nome' pelo campo correto que armazena o nome do setor
                    $valores[] = $agendamento->total;
                }

                $setoresNomes = $labels; // Sem a necessidade de json_encode



                return view('painel.painelAdm', compact('usuarios', 'userAno', 'userLabel', 'userTotal', 'setoresNomes', 'valores'));
            case 'prof':
                return view('painel.painelOrientador');

            case 'aluno':
                $agendamentosPorUsuarioESetor = DB::table('agendamentos')
                    ->select([
                        'id',
                        'IdSetor',
                        DB::raw('COUNT(*) as total')
                    ])
                    ->where('status', 'C')
                    ->groupBy('id', 'IdSetor')
                    ->get();

                $usuariosNomes = [];
                $setoresNomes = [];
                $valores = [];

                foreach ($agendamentosPorUsuarioESetor as $agendamento) {
                    $usuario = User::find($agendamento->id);
                    $setor = Setor::find($agendamento->IdSetor);

                    if ($usuario && $setor) {
                        $usuariosNomes[$usuario->nome][$setor->nome] = $agendamento->total;
                    }
                }
                  
                            
                    // Guardando os nomes dos setores para o gráfico
                    if (!in_array($setor->nome, $setoresNomes)) {
                        $setoresNomes[] = $setor->nome;
                    }
                }

                return view('painel.painel', compact('usuariosNomes', 'setoresNomes'));


        }
    }
