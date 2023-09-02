<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParametroRequest;
use App\Models\Local;
use App\Models\Periodo;
use App\Models\Setor;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function createOrEdit($tab = 'locais', $id = null)
    {
        $locais = Local::all();
        $setores = Setor::all();
        $periodos = Periodo::all();
        if ($id) {
            switch ($tab) {
                case "locais":
                    $categorias = local::where('id', '<>', $id)->get();
                    $registroL = Local::where('id', $id)->first();
                    if (!empty($registroL)) {
                        return view('painel.parametros.index', ['registroL' => $registroL, 'tab' => $tab, 'locais' => $locais, 'setores' => $setores, 'periodos' => $periodos]);
                    } else {
                        return redirect()->route('parametros-createOrEdit');
                    }
                    break;

                case "setores":
                    $setores = Setor::where('id', '<>', $id)->get();
                    $registroS = Setor::where('id', $id)->first();
                    if (!empty($registroS)) {
                        return view('painel.parametros.index', ['registroS' => $registroS, 'tab' => $tab, 'locais' => $locais, 'setores' => $setores, 'periodos' => $periodos]);
                    } else {
                        return redirect()->route('parametros-createOrEdit');
                    }
                    break;

                case "periodos":
                    $periodos = Periodo::where('id', '<>', $id)->get();
                    $registroP = Periodo::where('id', $id)->first();
                    if (!empty($registroP)) {
                        return view('painel.parametros.index', ['registroP' => $registroP, 'tab' => $tab, 'locais' => $locais, 'setores' => $setores, 'periodos' => $periodos]);
                    } else {
                        return redirect()->route('parametros-createOrEdit');
                    }
                    break;
            }
        } else {
            return view('painel.parametros.index', ['tab' => $tab, 'locais' => $locais, 'setores' => $setores, 'periodos' => $periodos]);
        }
    }

    public function storeOrUpdateLocal(ParametroRequest $request, $id = null)
    {
        if ($id) {
            $data = [
                'nome' => $request->nome,
            ];
            Local::where('id', $id)->update($data);
            return redirect()->route('parametros-createOrEdit', ['tab' => 'locais']);
        } else {
            $data = [
                'nome' => $request->nomeLocal,
            ];
            Local::create($data);
            return redirect()->route('parametros-createOrEdit', ['tab' => 'locais']);
        }
    }

    public function storeOrUpdateSetor(ParametroRequest $request, $id = null)
    {
        if ($id) {
            $data = [
                'nome' => $request->nome,
            ];
            Setor::where('id', $id)->update($data);
            return redirect()->route('parametros-createOrEdit', ['tab' => 'setores']);
        } else {
            Setor::create($request->all());
            return redirect()->route('parametros-createOrEdit', ['tab' => 'setores']);
        }
    }

    public function storeOrUpdatePeriodo(ParametroRequest $request, $id = null)
    {
        if ($id) {
            $data = [
                'nome' => $request->nome,
            ];
            Periodo::where('id', $id)->update($data);
            return redirect()->route('parametros-createOrEdit', ['tab' => 'periodos']);
        } else {
            Periodo::create($request->all());
            return redirect()->route('parametros-createOrEdit', ['tab' => 'periodos']);
        }
    }

    public function destroyLocal($id)
    {
        Local::where('id', $id)->delete();
        return redirect()->route('parametros-createOrEdit', ['tab' => 'locais']);
    }

    public function destroySetor($id)
    {
        Setor::where('id', $id)->delete();
        return redirect()->route('parametros-createOrEdit', ['tab' => 'setores']);
    }

    public function destroyPeriodo($id)
    {
        Periodo::where('id', $id)->delete();
        return redirect()->route('parametros-createOrEdit', ['tab' => 'periodos']);
    }
}
