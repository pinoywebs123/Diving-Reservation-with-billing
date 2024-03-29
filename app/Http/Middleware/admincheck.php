<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class admincheck
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
        if(!Auth::check()){
            return redirect()->route('auth_login');
        }
        if(Auth::user()->role_id != 1){
            abort(404);
        }
        return $next($request);
    }
}
