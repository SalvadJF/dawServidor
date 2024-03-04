
<?php 

// La tabla posesiones es una tabla pivote y muchos a muchos y no tiene modelo

// Usaremos belongToMany con el nombre la tabla pivote

public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,  'posesiones');
    }