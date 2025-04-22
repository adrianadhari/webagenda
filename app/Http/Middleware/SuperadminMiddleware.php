<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()?->type === 'Superadmin' || auth()->user()?->type === 'superadmin' || auth()->user()?->type === 'Admin') {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Anda bukan Superadmin atau Admin');
    }
}
