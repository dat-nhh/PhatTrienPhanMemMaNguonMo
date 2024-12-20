<?php

namespace Modules\UserManaging\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
            return $next($request);
        return redirect()->route('usermanaging');
    }
}
