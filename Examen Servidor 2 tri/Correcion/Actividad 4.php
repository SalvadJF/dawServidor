<?php 
/*
Crear un middleware:

Ejecuta el siguiente comando para generar un middleware llamado CheckOwnership:

bash

php artisan make:middleware CheckOwnership

Esto creará un archivo llamado CheckOwnership.php en el directorio app/Http/Middleware.

Implementar la lógica en el middleware:

Abre el archivo app/Http/Middleware/CheckOwnership.php y añade la lógica para verificar si el usuario logueado posee el videojuego indicado por su ID:

    */
php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Videojuego;

class CheckOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $videojuegoId = $request->route('id');
        $videojuego = Videojuego::find($videojuegoId);

        if (!$user || !$videojuego || !$user->poseidos->contains($videojuego)) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

/*
En este middleware, se verifica si hay un usuario logueado y si el videojuego indicado por el ID de la ruta pertenece al usuario logueado. Si no es así, se redirige al usuario a la página de inicio de sesión.

Registrar el middleware:

Abre el archivo app/Http/Kernel.php y registra el middleware en el arreglo $routeMiddleware:

*/
php

protected $routeMiddleware = [
    // Otros middlewares...
    'check_ownership' => \App\Http\Middleware\CheckOwnership::class,
];
/*
Aplicar el middleware a la ruta:

En el archivo de rutas routes/web.php, aplica el middleware check_ownership a la ruta videojuegos/{id}/edit:
*/
php

Route::get('videojuegos/{id}/edit', [VideojuegoController::class, 'edit'])
    ->middleware('check_ownership');