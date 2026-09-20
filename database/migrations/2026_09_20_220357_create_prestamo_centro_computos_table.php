<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamo_centro_computos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('centro_computo_id')
                ->constrained('centro_computos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('usuario_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('fecha_prestamo');

            $table->date('fecha_devolucion_programada');

            $table->date('fecha_devolucion_real')->nullable();

            $table->unsignedSmallInteger('cantidad_equipos')->default(1);

            $table->enum('estado', [
                'prestado',
                'devuelto',
                'atrasado',
            ])->default('prestado');

            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamo_centro_computos');
    }
};