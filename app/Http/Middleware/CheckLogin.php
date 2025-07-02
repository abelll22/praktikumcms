<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek session 'login'
        if (!session()->has('login')) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        return $next($request);
    }
}
