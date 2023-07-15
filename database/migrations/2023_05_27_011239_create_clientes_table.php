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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('transaccion_id')->unsigned()->nullable();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->date('fecha_nacimiento');
            $table->char('genero', 1)->default('M');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado');
            //$table->string('codigo_postal');
            $table->string('tipo_cliente')->default('persona');

            //relacion con transaccion
            $table->foreign('transaccion_id')->references('id')->on('transaccions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
