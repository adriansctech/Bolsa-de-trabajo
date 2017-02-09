<?php

namespace Bolsa\Http\Middleware;

use Closure;

class tipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $tipo)
    {
        
        if (Auth::User->tipo==$tipo) {
           return $next($request);
        }
        else{abort(404);}
        
    }
}
