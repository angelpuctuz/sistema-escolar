<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tutoria extends Model
{
    protected $table = 'tutorias';

    protected $fillable = [
        'alumno_id',
        'docente_id',
        'fecha',
        'motivo',
        'observaciones',
        'acuerdos',
        'acciones',
        'estado',
        'proxima_cita',
    ];

    protected $casts = [
        'fecha' => 'date',
        'proxima_cita' => 'date',
    ];

    public function alumno(): BelongsTo
    {
        return $this->belongsTo(Alumno::class);
    }

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }
}