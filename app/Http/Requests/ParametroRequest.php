<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParametroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('id');
        $tab = $this->segment(3);
        switch ($tab) {
            case "local":
                return [
                    'nomeLocal' => ['required', 'unique:locais,nome'],
                ];
                break;
            case "setor":
                return [
                    'nomeSetor' => ['required', 'unique:setores,nome,'],
                ];
                break;
            case "periodo":
                return [
                    'nomePeriodo' => ['required', 'unique:periodos,nome,'],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'required' => 'Campo Obrigatório!',
            'unique' => 'Nome já existente!',
        ];
    }
}
