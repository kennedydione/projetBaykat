<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, )
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }


        if (1==1) {
            return redirect("semence");//->route('semence.index')->with('error', 'Accès réservé aux agriculteurs.');
        }

        return $next($request);
    }

}
