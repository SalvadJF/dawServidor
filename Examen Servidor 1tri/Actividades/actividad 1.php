<?php

// Tabla Peliculas

public function proyecciones(): HasMany
{
    return $this->hasMany(Proyeccion::class);
}

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


    public function proyecciones(): HasMany
    {
        return $this->hasMany(Proyeccion::class);
    }
}

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
// Para que el nombre pueda adaptarse correctamente debemos hacerlo por separado
php artisan make:migration create_proyecciones_table
// Y el modelo
php artisan make:model Proyeccion


public function pelicula(): BelongsTo
{
    return $this->belongsTo(Pelicula::class);
}

public function sala(): BelongsTo
{
    return $this->belongsTo(Sala::class);
}

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

public function proyeccion(): BelongsTo
{
    return $this->belongsTo(Proyeccion::class);
}

    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyeccion_id');
            $table->timestamps();

            $table->foreign('proyeccion_id')->references('id')->on('proyecciones');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
