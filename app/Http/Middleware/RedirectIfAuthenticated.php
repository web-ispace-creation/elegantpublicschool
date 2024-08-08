<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if ($request->expectsJson()) {
            return null;
        }
        $guards = empty($guards) ? [null] : $guards;
        // dd($guards,session()->all(),1);
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect('/seller')
                    ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
                }
                if ($guard === 'web') {
                    return redirect('/')
                    ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
                }
            }
        }

        return $next($request);
    }
}
