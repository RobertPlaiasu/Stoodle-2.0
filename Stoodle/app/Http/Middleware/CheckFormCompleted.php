<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckFormCompleted
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
        if (\Auth::user() &&  \Auth::user()->job != NULL) 
            return $next($request);
     
        return redirect('form');
    }
}
