<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class ApiAuthenticate 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, $guards=null)
    {
        $this->authenticate($request, $guards);
        return $next($request);
    }

    protected function authenticate($request, $guards)
    {
        $authType = null;
            $authData = null;

        if (empty($guards)) {
            $guards = [null];
        }

        if ($this->auth->guard($guards)->check()) {
         
            return $this->auth->shouldUse($guards);
        }
       
    $this->responseTo($guards,$request);

        // throw new AuthenticationException(
        //     'Unauthenticated.', $guards, $this->responseTo($guards,$request)
        // );
    }
    
    protected function responseTo($guards,$request){
        if (! $request->header('Authorization')) {
            $error = 'not a valid api authorization';
        }
        $authType = null;
        $authData = null;
        @list($authType, $authData) = explode(" ", $request->header('Authorization'), 2);

        // If the Authorization Header is not a bearer type, return a 401.
        if ($authType != 'Bearer') {
            $error = 'use Bearer token type authorization';
        }

        $response =[
            'status'=>401,
            'unauthenticated'=>401,
            'message'=>isset($error)?$error:'not a valid api request',
            

        ];
   
      return response()->json($response,401);
       

    }




   
}