<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'idmatricula',
        'nombres',
        'apellidos',
        'email',
        'grado',
        'grupo',
        'grupo_id',
    ];

    /**
     * Relación: un alumno pertenece a un grupo.
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}