<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class esAsesor
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
        if (Auth::check()){//Checar si esta logeado
            $user = Auth::user();
            if ($user->esActivo() && $user->esAdmin()){
                return redirect ('/admin');
            }
            else if ($user->esActivo() && $user->esAsesor()){
                return $next($request); 
            }
            else{
                return redirect ('/noaccess');
                }
         }
         else{//Si no esta logeado
             return redirect ('/login');
         }
            
    }
}
