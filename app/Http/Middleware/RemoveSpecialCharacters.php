<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\TransformsRequest;
use Closure;
use Config;

class RemoveSpecialCharacters extends TransformsRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function transform($key, $value)
    {
        // return false;
        \Log::info($key);
        \Log::info( $value);
        $result = $value; 
        $except = Config::get('specialchars.except');
        if(in_array($key, $except)) return $result;

        $ignoredCharacters = Config::get('specialchars.chars');
        for($i=0; $i<$ignoredCharacters; $i++){
            $result = preg_replace("/". $ignoredCharacters ."/", "", $result);  
        }        
        return $result;
    }
}
