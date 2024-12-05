<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()) {

            return redirect()->route('signin');
        }

        return $next($request);
    }
}

