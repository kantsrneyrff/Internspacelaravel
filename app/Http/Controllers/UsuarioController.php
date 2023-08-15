<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassWordRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('id', '!=', Auth::id())->get();
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
            'genero'=>$request->genero,
            'cpf'=>$request->cpf,
            'rg'=>$request->rg,
            'telefone'=>$request->telefone,
            'cep'=>$request->cep,
            'logradouro'=>$request->logradouro,
            'complemento'=>$request->complemento,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,
            'uf'=>$request->uf,
            'email'=>$request->email,
            'cargo'=>$request->cargo,
        ];
        User::where('id', $id)->update($data);
        return redirect()->route('usuarios-index');
    }

    public function updateSenha(PassWordRequest $request, $id)
    {
        $request->merge(['password' => bcrypt($request->input('password'))]);
        $data = [
            'password'=>$request->password,
        ];
        User::where('id', $id)->update($data);
        return redirect()->route('usuarios-index');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('usuarios-index');
    }
}
