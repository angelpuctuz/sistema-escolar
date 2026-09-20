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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');

            $table->text('descripcion')->nullable();

            $table->date('fecha_inicio');

            $table->date('fecha_fin')->nullable();

            $table->time('hora_inicio')->nullable();

            $table->time('hora_fin')->nullable();

            $table->string('lugar')->nullable();

            $table->string('responsable');

            $table->enum('estado', [
                'programado',
                'en curso',
                'finalizado',
                'cancelado',
            ])->default('programado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};