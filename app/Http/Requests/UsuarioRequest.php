<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        if ($id != null) {
            return [
                'nome' => ['required'],
                'dataNascimento' => ['required', 'date'],
                'telefone' => ['required'],
                'bairro' => ['required'],
                'cidade' => ['required'],
                'cpf' => [
                    'required', 'unique:users,cpf,' . $id,
                    function ($attribute, $value, $fail) {
                        if (!validarCPFCNPJ($value)) {
                            $fail('O CPF informado não é válido.');
                        }
                    }
                ],
                'uf' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,' . $id,],
                'cargo' => ['required'],
            ];
        } else {
            return [
                'nome' => ['required'],
                'dataNascimento' => ['required', 'date'],
                'telefone' => ['required'],
                'bairro' => ['required'],
                'cidade' => ['required'],
                'cpf' => [
                    'required', 'unique:users,cpf,' . $id,
                    function ($attribute, $value, $fail) {
                        if (!validarCPFCNPJ($value)) {
                            $fail('O CPF informado não é válido.');
                        }
                    }
                ],
                'uf' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,' . $id,],
                'password' => ['required', 'same:passwordConfirm'],
                'passwordConfirm' => ['required', 'same:password'],
                'cargo' => ['required'],
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'Campo Obrigatório!',
            'cpf.unique' => 'CPF já existente!',
            'email.unique' => 'E-mail já existente!',
            'email' => 'E-mail inválido',
            'same' => 'As senhas não conferem!',
        ];
    }
}
