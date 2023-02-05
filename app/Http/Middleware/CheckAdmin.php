<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class CheckAdmin
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
        $user = User::find($auth->tokenable_id);
        if(!$user){
            return response()->json(['data'=>null,'message' => 'You Must Login First !','status' =>false])->setStatusCode(401);
        }
        if($user->deleted_at  != null){
            return response()->json(['data'=>null,'message' => 'User Not Found','status' =>false])->setStatusCode(401);

        }
        if($user->role  == 4){
            return response()->json(['data'=>null,'message' => 'Admin Only Can Login Here !','status' =>false])->setStatusCode(401);
        }
        return $next($request);
    }
}
