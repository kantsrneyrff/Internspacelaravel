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
}
