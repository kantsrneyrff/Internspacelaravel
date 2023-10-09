<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class HorasController extends Controller
{

  
    public function horas(){

        $agendamentos = Agendamento::where('status', 'C')->get();

        foreach ($agendamentos as $agendamento) {
            if ($agendamento->idPeriodo == "3") {
                $horas = 8;
            } else {
                $horas = 4;
            }
    
            $agendamento->horas_ate_agora = $horas;
        }
    
        return view('painel.confirmPresenca.horas', ['agendamentos' => $agendamentos]);
    }

    
}
