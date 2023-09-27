<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\User;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\DB;


class GraficoController extends Controller
{



    public function grafico()
    {
        $usuarios = User::all()->count();
        $userData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total ')
        ])->Groupby('ano')->orderBy('ano', 'asc')->get();

        foreach ($userData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        $userLabel = "'Cadastro usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);
        $maxUserTotal = max($total);

        return view('painel.painelAdm', compact('usuarios', 'userAno', 'userLabel', 'userTotal', 'user', 'maxUserTotal'));
    }
}
