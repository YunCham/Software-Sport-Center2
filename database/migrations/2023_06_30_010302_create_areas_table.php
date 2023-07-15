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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_Area');
            $table->string('tipo_Area');
            $table->integer('capacidad')->nullable();
            $table->string('estado')->default('disponible');
            $table->time('horario_apertura')->nullable();
            $table->time('horario_cierre')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
