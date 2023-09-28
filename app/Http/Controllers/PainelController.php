<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            
                return view('painel.painelAdm', compact('usuarios', 'userAno', 'userLabel', 'userTotal'));
            
            
            case 'prof':
                return view('painel.painelOrientador');
            
            case 'aluno':
                return view('painel.painel');
        }
    }
}
