<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckIfAdmin
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

        if (\Auth::user() &&  \Auth::user()->admin == 1) {
            return $next($request);
     }
        return redirect()->back();
    }
}
