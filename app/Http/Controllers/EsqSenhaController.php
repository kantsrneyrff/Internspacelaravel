<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsqSenhaController extends Controller
{
    public function index(){
        return view('painel.esqSenha.index' );        
    }
}
