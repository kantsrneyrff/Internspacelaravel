<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            return redirect()->route('painel-index');
        }
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'required' => 'Campo Obrigatório',
            'email' => 'Email Inválido'
        ]);
        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated) {
            return redirect()->route('login')->withErrors(['error' => 'Email ou senha não encontrado']);
        }
        return redirect()->route('painel-index');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
