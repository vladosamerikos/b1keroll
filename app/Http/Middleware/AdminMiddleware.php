<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()) {

            // Admin role == 1
            // User role == 0

            if(Auth::user()->role == '1'){

                return $next($request);

            }else{

                return redirect('/main')->with('message', 'Aceso denegado no eres administrador!');

            }

        }else{

            return redirect('/login')->with('message', 'Inicia session para acceder a la pagina.');

        }

    }
}
