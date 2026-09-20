<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CentroComputo extends Model
{
    protected $table = 'centro_computos';

    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'activo',
        'descripcion',
    ];

    protected $casts = [
        'capacidad' => 'integer',
        'activo' => 'boolean',
    ];

    public function prestamos(): HasMany
    {
        return $this->hasMany(
            PrestamoCentroComputo::class,
            'centro_computo_id'
        );
    }
}