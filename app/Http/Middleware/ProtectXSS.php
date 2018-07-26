<?php

namespace App\Http\Middleware;

use Closure;

class ProtectXSS
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
        $vetor = $request->all();

        foreach ($vetor as $key => $value){
            $vetor[$key] = strip_tags($value);
        }

        $request->merge($vetor);

        return $next($request);
    }
}