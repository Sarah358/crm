<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckActive
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
        // if the user isActive is not 1 then we logout the user

        if (! Auth::user()->isActive == 1) {
            Auth::logout();
// redirect to login page with an error message
            return redirect('/login')->with('not-active', 'Your account is no longer active,contact your administrator if this is an error');
        }
        return $next($request);
    }
}
