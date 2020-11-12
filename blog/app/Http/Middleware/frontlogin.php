<?php

namespace App\Http\Middleware;

Use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;


class frontlogin
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
        if (empty(Session::has('frontSession'))){
            return redirect('/login-registration');
        }
        return $next($request);
    }
}
