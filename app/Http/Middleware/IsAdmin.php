<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário autenticado é um administrador
        if (Auth::guard('web')->check() && Auth::user()->tipo === 'admin') {
            return $next($request); // Permite o acesso
        }

        // Redireciona para a página de login ou homepage
        return redirect()->route('site.site'); // Redireciona para o site
    }
}
