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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 6)->unique();
            $table->string('compañia aerea');
            $table->dateTime('salida');
            $table->dateTime('llegada');
            $table->boolean('completado')->default('false');
            $table->integer('plazas');
            $table->decimal('precio');
            $table->string('origen');
            $table->string('destino');

            $table->foreign('origen')->references('codigo')->on('aeropuertos');
            $table->foreign('destino')->references('codigo')->on('aeropuertos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
