<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListagensController extends Controller
{
    public function usuario()
    {
        $$usuarios = User::where('id', '!=', Auth::id())->get();
        return view('painel.usuarios.ListUsers', ['usuarios' => $usuarios]);
    }
}