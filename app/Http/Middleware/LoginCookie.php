<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $studentID = \Cookie::get('studentID');
        if($studentID != null){
            return redirect('Main');
        }
        return $next($request);
    }
}
