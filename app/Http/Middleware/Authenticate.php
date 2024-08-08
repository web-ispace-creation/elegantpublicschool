<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            try {
                $url = $request->session()->get('_previous.url');
                $request->session()->put('url.intended', $url);
                return null;
            } catch (\Throwable $th) {
                return null;
            }
        }
        
        // Check the guard type and redirect accordingly
        // $guard = $this->auth->guard();
        $middlewares = $request->route()->middleware();
        if(in_array('web', $middlewares) && auth()->user() == null){
            if (in_array('auth:admin', $middlewares)) {
                return route('admin.login');
            } else {
                return route('user.signin');
            }
        }else{
            return response()->json(['status'=>500,'msg'=>'Sorry,something went wrong!'],500);
            
        }
    }
}
