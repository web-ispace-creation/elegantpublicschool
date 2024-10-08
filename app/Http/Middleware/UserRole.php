<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if($role == 'admin'){
            if ($request->user() && $request->user()->role !== 'admin') {
                abort(403, 'Unauthorized action.');
            }
        }
        if($role == 'member'){
            if ($request->user() && ($request->user()->role !== 'admin' && $request->user()->role !== 'member')) {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}
