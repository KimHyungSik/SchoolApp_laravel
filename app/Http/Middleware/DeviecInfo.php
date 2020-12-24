<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeviecInfo{

    public function handle(Request $request, Closure $next){
        $response = $next($request);

        $studentID = \Cookie::get('studentID');
        //Devicec MODEL, VERSION, clientIP
        $deviec_info = \Cookie::get('DeviecInfo');
        
        if($deviec_info == null){
            return $response;
        }

        

        return $response;
    }

}
