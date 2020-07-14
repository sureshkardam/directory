<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'api_test')
    { 
        if(Auth::guard($guard)->check())
        {
            echo 'home';
            exit;
        }

        return $next($request);

        exit;
        //     print_r($request->header('Authorization'));
        //     exit;
        // if($request->header('Authorization')){
        //     return $next($request);
        //   }
        //   return response()->json([
        //     'message' => 'Not a valid API request.',
        //   ]);

        //return $next($request);
    }
}
