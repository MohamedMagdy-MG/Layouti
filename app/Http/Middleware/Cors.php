<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
      public function handle($request, Closure $next)
    {

            $response = $next($request);
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Content-Range, Content-Disposition, Content-Description, X-Auth-Token');
            $response->header('Access-Control-Allow-Origin', '*');
            //add more headers here
            return $response;
            
            // return $next($request)
            //         ->header('Access-Control-Allow-Origin', '*')
            //         ->header('Access-Control-Allow-Methods', 'PUT, POST, DELETE,GET, OPTIONS')
            //         ->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization');
            
            // if ($request->getMethod() === "OPTIONS") {
            // return response('');
            // }
            // return $next($request);
            
        //         return $next($request)
        // ->header('Access-Control-Allow-Origin', '*')
        // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        
            // header("Access-Control-Allow-Origin: *");
            // //ALLOW OPTIONS METHOD
            // $headers = [
            //     'Access-Control-Allow-Methods' => 'POST,GET,OPTIONS,PUT,DELETE',
            //     'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
            // ];
            // if ($request->getMethod() == "OPTIONS"){
            //     //The client-side application can set only headers allowed in Access-Control-Allow-Headers
            //     return response()->json('OK',200,$headers);
            // }
            // $response = $next($request);
            // foreach ($headers as $key => $value) {
            //     $response->header($key, $value);
            // }
            // return $response;
            //return response()->json(compact('token'))->header("Access-Control-Allow-Origin",  "*");


    

        }
}