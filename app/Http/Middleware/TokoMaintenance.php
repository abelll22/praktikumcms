<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokoMaintenance
{
    public function handle(Request $request, Closure $next)
    {
        if (env('TOKO_MAINTENANCE', false)) {
            return response()->view('toko_maintenance');
        }

        return $next($request);
    }
}
