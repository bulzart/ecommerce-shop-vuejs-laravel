<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class isadministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'admin'){
        return $next($request);
        }
        else
        abort(403);
    }
}
