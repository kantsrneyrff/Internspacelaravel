<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
       'id',
       'nome',
       'email',
       'senha',
       'dataNascimento',
       'genero',
       'telefone',
       'cpf',
       'documento',
       'cep',
       'logradouro',
       'numero',
       'complemento',
       'bairro',
       'cidade',
       'uf',
       'cargo',
    ];
}
