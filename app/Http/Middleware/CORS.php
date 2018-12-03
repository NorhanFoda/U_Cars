<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-type, X-Auth-Token, Authorization, Origin');
        
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Content-Type: form-data; charset=UTF-8");
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type,application/x-www-form-urlencoded, Content-Range, Content-Disposition, Content-Description');
        return $next($request);
    }
}
