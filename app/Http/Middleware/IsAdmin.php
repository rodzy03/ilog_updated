<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

        if ( Auth::check() && Auth::user()->role == 'admin' && Auth::user()->active_flag == 1) {
            
            return $next($request);
        }
        
        return redirect('login');
        
    }
}

  

            // } else if ( $request->user()->role == "admin" ) {

            //     return redirect()->guest('admihhome');
            // }