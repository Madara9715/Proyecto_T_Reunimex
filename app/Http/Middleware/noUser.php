<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class noUser
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
       if(Auth::check()){
        if(Auth::user()->esAdmin()){
            return redirect ('admin');
           }
         else if(Auth::user()->esAsesor()){
            return redirect ('asesor');
           }
           else {
            return $next($request);
           }
       }
            return $next($request);
    }
}
