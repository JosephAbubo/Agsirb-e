<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // dd(auth()->user()->type == 1);
        if(auth()->user()->type == $userType){
            return $next($request);
        }

        return response()->json(['You do not have permission to access for this page!']);
    }
}
