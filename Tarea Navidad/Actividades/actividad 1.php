<?php

# Crear las tablas con las migraciones correspondientes 
# (una migración por cada tabla) en el orden correcto 

Schema::create('alumnos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->timestamps();
});

Schema::create('ccee', function (Blueprint $table) {
    $table->id();
    $table->string('ce')->unique();
    $table->string('descripcion');
    $table->timestamps();
});


Schema::create('notas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('alumno_id')->constrained();
    $table->foreignId('ccee_id')->constrained('ccee');
    $table->decimal('nota', 3, 1);
    $table->timestamps();
    $table->unique(['alumno_id', 'ccee_id']);
});

Schema::table('notas', function (Blueprint $table) {
    $table->dropUnique('notas_alumno_id_ccee_id_unique');
});

Schema::table('notas', function (Blueprint $table) {
    $table->unique(['alumno_id', 'ccee_id']);
});

