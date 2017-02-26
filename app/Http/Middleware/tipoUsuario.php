<?php

namespace Bolsa\Http\Middleware;

use Closure;
use Auth;

//Middleware para comprobar el tipo de usuario que esta logueado en el sistema
class tipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //Recoge todos los tipos que se incluyan separados por '-'
    public function handle($request, Closure $next, $tipo)
    {
        $tipos = explode('-', $tipo);
        foreach ($tipos as $tipo){
            if (Auth::User()->tipo==$tipo) {
                return $next($request);
            }
        }
        abort(404);
        
    }
}
