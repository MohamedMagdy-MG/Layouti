<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $accessToken = request()->bearerToken();
        $auth = PersonalAccessToken::find($accessToken);
        if(!$auth){
            return response()->json(['data'=>null,'message' => 'You Must Login First !','status' =>false])->setStatusCode(401);
        }
        return $next($request);
    }
}
