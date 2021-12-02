<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Hash;
class MobileMiddleware
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
        $public_token = "f09ce7d1649c2b7de84bed8834846c7d";
        $user_token = DB::table('r_users')->where('public_token',$public_token)->value('public_token');
        if(  $public_token  === $user_token  ) {
            return $next($request);
        }
        
        return response("Not Allowed");
        
    }
}
