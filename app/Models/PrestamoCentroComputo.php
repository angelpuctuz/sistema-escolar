<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrestamoCentroComputo extends Model
{
    protected $table = 'prestamo_centro_computos';

    protected $fillable = [
        'centro_computo_id',
        'usuario_id',
        'fecha_prestamo',
        'fecha_devolucion_programada',
        'fecha_devolucion_real',
        'cantidad_equipos',
        'estado',
        'observaciones',
    ];

    protected $casts = [
        'fecha_prestamo' => 'date',
        'fecha_devolucion_programada' => 'date',
        'fecha_devolucion_real' => 'date',
        'cantidad_equipos' => 'integer',
    ];

    public function centroComputo(): BelongsTo
    {
        return $this->belongsTo(CentroComputo::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}