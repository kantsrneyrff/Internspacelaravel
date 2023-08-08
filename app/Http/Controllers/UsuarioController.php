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

    // public function update(ClienteRequest $request, $id)
    // {
    //     $data = [
    //         'CodCliente'=>$request->CodCliente,
    //         'Referencia'=>$request->Referencia,
    //         'TipoCliente'=>$request->TipoCliente,
    //         'Nome'=>$request->Nome,
    //         'Sexo'=>$request->Sexo,
    //         'CPF_CNPJ'=>$request->CPF_CNPJ,
    //         'Identidade'=>$request->Identidade,
    //         'DataNascimento'=>$request->DataNascimento,
    //         'DataCadastro'=>$request->DataCadastro,
    //         'Email'=>$request->Email,
    //         'CEP'=>$request->CEP,
    //         'Endereco'=>$request->Endereco,
    //         'Complemento'=>$request->Complemento,
    //         'NuCasa'=>$request->NuCasa,
    //         'Cidade'=>$request->Cidade,
    //         'Bairro'=>$request->Bairro,
    //         'UF'=>$request->UF,
    //         'Filiacao'=>$request->Filiacao,
    //         'Celular1'=>$request->Celular1,
    //         'Celular2'=>$request->Celular2,
    //         'ClienteInativo'=>$request->ClienteInativo,
    //         'Grupo'=>$request->Grupo,
    //         'OBS'=>$request->OBS,
    //     ];
    //     Cliente::where('ID', $id)->update($data);
    //     return redirect()->route('clientes-index');
    // }

    // public function destroy($id)
    // {
    //     Cliente::where('ID', $id)->delete();
    //     return redirect()->route('clientes-index');
    // }
}