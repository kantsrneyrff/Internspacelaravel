<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('painel.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('painel.usuarios.create');
    }

    public function store(UsuarioRequest $request)
    {
        $request->merge(['password' => bcrypt($request->input('password'))]);

        User::create($request->all());
        return redirect()->route('usuarios-index');
    }

    public function edit($id)
    {
        $usuario = User::where('id', $id)->first();
        if (!empty($usuario)) {
            return view('painel.usuarios.edit', ['usuario' => $usuario]);
        } else {
            return redirect()->route('usuarios-index');
        }
    }

    public function update(UsuarioRequest $request, $id)
    {
        $data = [
            'nome'=>$request->nome,
            'dataNascimento'=>$request->dataNascimento,
            'genero'=>$request->nome,
            'nome'=>$request->nome,
            'nome'=>$request->nome,
            'nome'=>$request->nome,
            'nome'=>$request->nome,
            'nome'=>$request->nome,
            'nome'=>$request->nome,
        ];
        User::where('ID', $id)->update($data);
        return redirect()->route('usuarios-index');
    }

    // public function destroy($id)
    // {
    //     Cliente::where('ID', $id)->delete();
    //     return redirect()->route('clientes-index');
    // }
}
