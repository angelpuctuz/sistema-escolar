<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = [
        'clave',
        'nombre',
        'descripcion',
        'semestre',
        'creditos',
        'activa',
    ];

    protected $casts = [
        'semestre' => 'integer',
        'creditos' => 'integer',
        'activa' => 'boolean',
    ];
}
