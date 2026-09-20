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
        Schema::create('tutorias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('alumno_id')
                ->constrained('alumnos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('docente_id')
                ->nullable()
                ->constrained('docentes')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->date('fecha');

            $table->string('motivo');

            $table->text('observaciones')->nullable();

            $table->text('acuerdos')->nullable();

            $table->text('acciones')->nullable();

            $table->enum('estado', [
                'pendiente',
                'en seguimiento',
                'finalizada',
            ])->default('pendiente');

            $table->date('proxima_cita')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorias');
    }
};