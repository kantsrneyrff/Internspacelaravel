<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassWordRequest extends FormRequest
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
            'password' => ['required'],
            'passwordConfirm' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Campo Nova Senha Obrigatório!',
            'passwordConfirm.required' => 'Campo Confirmar Senha Obrigatório!',
            'same' => 'As senhas não conferem!',
        ];
    }
}
