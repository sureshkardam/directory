<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class partnerMiddleware
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
        if(empty($request->user())){
            $response =[
            'status'=>401,
            'unauthenticated'=>401,
            'message'=>isset($error)?$error:'not a valid api request',
            

         ];

         return response()->json($response,401);
   
        }

        if($request->user()==='null'){
            return response('User does not have permission to access this page',401);
   }

      
        if(Auth::user()->user_type==1){
            return $next($request);
        }
        return response('User does not have permission to access this page',401);
        
    }
}
