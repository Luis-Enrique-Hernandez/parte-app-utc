<?php

namespace App\Http\Middleware;

use Closure;

class AdminmiddlewareHernandez
{
    /**

    una vez halla echo esto toca que ir al kernel de los controladores y colocar la ruta
    en que se halla este middleware sin colocarle la estenxion originaria

     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (!auth()->user()->admin) {
            return redirect('/');
        }

        return $next($request);
    }
}
