<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'horas',
        'idAluno',
        'idSetor',
        'idPeriodo',
        'idLocal',
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idPeriodo');
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'idLocal');
    }

    public function aluno()
    {
        return $this->belongsTo(User::class, 'idAluno');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'idSetor');
    }
}
