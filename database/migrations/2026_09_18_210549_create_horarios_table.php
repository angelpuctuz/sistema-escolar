<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('docente_id')
                ->constrained('docentes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('materia_id')
                ->constrained('materias')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('grupo_id')
                ->constrained('grupos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('salon_id')
                ->constrained('salons')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->enum('dia_semana', [
                'lunes',
                'martes',
                'miercoles',
                'jueves',
                'viernes',
                'sabado',
            ]);

            $table->time('hora_inicio');
            $table->time('hora_fin');

            $table->timestamps();

            $table->unique([
                'grupo_id',
                'dia_semana',
                'hora_inicio',
                'hora_fin',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};