<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('painel.agendamentos.index', ['agendamentos' => $agendamentos]);
    }

    public function create()
    {
        return view('painel.agendamentos.create');
    }
    /*
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

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('usuarios-index');
    }
    */
}
