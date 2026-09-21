
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar la migración.
     */
    public function up(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->dropColumn('creditos');
        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->unsignedInteger('creditos')->default(1);
        });
    }
};