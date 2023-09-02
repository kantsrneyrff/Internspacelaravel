<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoRequest extends FormRequest
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
        return [
            'idLocal' => ['required'],
            'idSetor' => ['required'],
            'idPeriodo' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo Obrigatório!',
        ];
    }
}
