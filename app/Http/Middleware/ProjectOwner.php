<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProjectOwner
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
        if( Auth::check() && Auth::user()->isProjectOwner() ) {
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
//isProjectOwner