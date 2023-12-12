<?php

// Tabla Peliculas
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('peliculas');
    }


// Tabla Salas

    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('salas');
    }


// Tabla Proyecciones

    public function up()
    {
        Schema::create('proyecciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelicula_id')->constrained();
            $table->foreignId('sala_id')->constrained();
            $table->dateTime('fecha_hora');
            $table->timestamps();

            $table->unique(['pelicula_id', 'fecha_hora', 'sala_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyecciones');
    }


// Tabla Entradas

    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyeccion_id');
            $table->timestamps();

            $table->foreign('proyeccion_id')->references('id')->on('proyecciones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
