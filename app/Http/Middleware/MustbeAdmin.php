<?php

namespace App\Http\Middleware;
use App\Models\Users;
use Closure;

class MustbeAdmin
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
       $users = Users::all();
       foreach( $users as $user){
            if($user && $user->level=='ADMIN'){
                
                return $next($request);
            }
            abort(403);
       }
    }
}
