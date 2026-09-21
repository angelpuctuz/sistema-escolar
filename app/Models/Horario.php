<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'docente_id',
        'materia_id',
        'grupo_id',
        'salon_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
}