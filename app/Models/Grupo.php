<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $fillable = [
        'nombre',
        'grado',
        'turno',
        'ciclo_escolar',
        'activo',
    ];

    protected $casts = [
        'grado' => 'integer',
        'ciclo_escolar' => 'integer',
        'activo' => 'boolean',
    ];
}