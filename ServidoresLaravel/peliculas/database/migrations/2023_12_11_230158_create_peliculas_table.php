<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('anyo');
            $table->foreignId('genero_id')->constrained();
            $table->timestamps();
        });
        DB::table('peliculas')->insert([
            ['titulo' => 'La guerra', 'anyo' => 2012, 'genero_id' => 1],
            ['titulo' => 'La guerra 2', 'anyo' => 2012, 'genero_id' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
