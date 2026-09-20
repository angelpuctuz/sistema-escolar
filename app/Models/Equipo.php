<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $fillable = [
        'codigo',
        'nombre',
        'tipo',
        'marca',
        'modelo',
        'estado',
        'descripcion',
        'observaciones',
    ];

    public function prestamos(): HasMany
    {
        return $this->hasMany(Prestamo::class);
    }
}