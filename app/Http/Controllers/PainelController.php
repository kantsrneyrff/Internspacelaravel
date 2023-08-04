<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        switch ($user->cargo) {
            case 'adm':
                return view('painel.painelAdm', ['user' => $user]);
                break;
            case 'prof':
                return view('painel.painelOrientador', ['user' => $user]);
                break;
            case 'aluno':
                return view('painel.painel', ['user' => $user]);
                break;
        }
    }
}
