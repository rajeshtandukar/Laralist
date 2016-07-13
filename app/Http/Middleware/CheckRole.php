<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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

        // Get the required roles from the route
        $role = 'admin';

       // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if($request->user()->hasRole($role) )
        {
            return $next($request);
        }
        return response([
            'error' => [
                'code' => 'INSUFFICIENT_ROLE',
                'description' => 'You are not authorized to access this resource.'
            ]
        ], 401);
       
    }
        
}
