<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( Auth::check() && Auth::user()->isEmployee() ) {
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
