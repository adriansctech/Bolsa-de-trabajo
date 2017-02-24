<?php

namespace Bolsa\Http\Middleware;

use Closure;
use Auth;

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
        $tipos = explode('-', $tipo);
        foreach ($tipos as $tipo){
            if (Auth::User()->tipo==$tipo) {
                return $next($request);
            }
        }
        abort(404);
        
    }
}
