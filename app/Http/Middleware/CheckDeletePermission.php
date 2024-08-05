<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDeletePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
         // dd('Hola midelware');
       
        // Verificar si el usuario está autenticado y tiene permiso para eliminar
       // return $next($request);
       if (Auth::check() && Auth::user()->role === 'admin') {
        //dd('Eres administrador');
        echo "Eres administrador puedes seguir";
        return $next($request);
    }

        // Redirigir a la ruta 'home' si el usuario no tiene permiso
        return redirect()->route('home')->with('error', 'No tienes permiso para realizar esta acción.');
    }
}
