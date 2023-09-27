<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Adicionei o use para o modelo User
use Illuminate\Support\Facades\DB; // Adicionei o use para a classe DB

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
                ])
                    ->Groupby('ano')
                    ->orderBy('ano', 'asc')
                    ->get();

                foreach ($userData as $user) {
                    $ano[] = $user->ano;
                    $total[] = $user->total;
                }

                $userLabel = "'Cadastro usuários'";
                $userAno = implode(',', $ano);
                $userTotal = implode(',', $total);
                $maxUserTotal = max($total);
                return view('painel.painelAdm', compact('usuarios', 'userAno', 'userLabel', 'userTotal', 'user', 'maxUserTotal'));

                return view('painel.painelAdm');
                break;
            case 'prof':
                return view('painel.painelOrientador');
                break;
            case 'aluno':
                return view('painel.painel');
                break;
        }
    }

    public function grafico()
    {
        return view('painel.painelAdm', compact('usuarios', 'userAno', 'userLabel', 'userTotal', 'user', 'maxUserTotal'));
    }
}
