<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Eliminar los campos antiguos de grado y grupo.
     */
    public function up(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn(['grado', 'grupo']);
        });
    }

    /**
     * Restaurar los campos si se revierte la migración.
     */
    public function down(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->string('grado')->after('email');
            $table->string('grupo')->after('grado');
        });
    }
};