<?php 
/*
    Crear una política de autorización:

    Ejecuta el siguiente comando para generar una política de autorización llamada VideojuegoPolicy:
    
    bash
    
    php artisan make:policy VideojuegoPolicy --model=Videojuego
    
    Esto creará un archivo VideojuegoPolicy.php en el directorio app/Policies.
    
        Implementar la lógica en la política:
    
    Abre el archivo app/Policies/VideojuegoPolicy.php y añade la lógica para verificar si el usuario logueado posee el videojuego indicado por su ID:
*/
    php
    
    namespace App\Policies;
    
    use App\Models\User;
    use App\Models\Videojuego;
    
    class VideojuegoPolicy
    {
        public function edit(User $user, Videojuego $videojuego)
        {
            return $user->poseidos->contains($videojuego);
        }
    }
    
    # Registrar la política:
    
   # Abre el archivo app/Providers/AuthServiceProvider.php y añade la política en el arreglo $policies:
    
    php
    
    use App\Models\Videojuego;
    use App\Policies\VideojuegoPolicy;
    
    protected $policies = [
        Videojuego::class => VideojuegoPolicy::class,
    ];
    
    # Añadir lo siguente al edit del controlador
    $this->authorize('edit', $videojuego);
    /*    Aplicar la política a la ruta:
    
    En el archivo de rutas routes/web.php, puedes usar el método authorizeResource para aplicar automáticamente las políticas de autorización a las acciones del controlador VideojuegoController:
    */
    php
    
    use App\Http\Controllers\VideojuegoController;
    
    Route::resource('videojuegos', VideojuegoController::class)->middleware('auth');
    
   # Esto aplicará automáticamente la política VideojuegoPolicy a las acciones del controlador VideojuegoController, como edit, update, delete, etc. Sin embargo, necesitas asegurarte de que el usuario esté autenticado (middleware('auth')) antes de que se aplique la política. Si deseas aplicar la política solo a una acción específica, puedes hacerlo manualmente en la definición de la ruta como se muestra a continuación:
    
    php
    
    Route::get('videojuegos/{id}/edit', [VideojuegoController::class, 'edit'])->middleware('can:edit,videojuego');
    
    # Con esta configuración, Laravel aplicará la política edit de VideojuegoPolicy antes de permitir el acceso a la ruta videojuegos/{id}/edit. Si la política edit devuelve false, Laravel automáticamente devolverá una respuesta de acceso no autorizado.