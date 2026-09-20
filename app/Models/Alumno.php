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
    ];
}