<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewarePrueba
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // aca escribimos toda la logica. por ej si el usuario no es administrador redirigilo a la home, o podemos poner logica de...veamos que idioma eligio el usuario y traduzcamos la pagina.
      echo "Me encuentro en el middleware!<br>";
        return $next($request);
    }
}
