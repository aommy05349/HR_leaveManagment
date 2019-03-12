<?php

namespace App\Http\Middleware;
use App\Models\Users;

use Illuminate\Auth\Middleware\Authenticate;
use Exception;
use Closure;
use Session;
use Illuminate\Auth\AuthenticationException; 
use Illuminate\Contracts\Auth\Factory as Auth;
class AuthenticateAdmin 
{
    
    // public function __construct(Auth $auth)
    // {
    //     parent::__construct($auth);
    // }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if($user && $user->level =='ADMIN'){
            return $next($request);
        }
     
    }
}
