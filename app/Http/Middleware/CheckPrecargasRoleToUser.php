<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPrecargasRoleToUser
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
        // CANCELAR PETICION SI EL USUARIO NO ESTA LOGEADO
        if(!Auth::check()){
            return redirect('/');
        }

        // CANCELAR PETICION SI USUARIO NO TIENE PERMISO DE AGREGAR PRECARGAS
        if(!Auth::user()->role->precargas){
            return redirect('/inicio');
        }

        return $next($request);
    }
}
