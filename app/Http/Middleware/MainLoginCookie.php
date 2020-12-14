<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MainLoginCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //로그인 쿠기 없는 경우 로그인 페이지로 이동
    public function handle(Request $request, Closure $next)
    {
        //로그인 쿠키 검사
        $studentID = \Cookie::get('studentID');
        if($studentID == null){
            return redirect('/');
        }
        return $next($request);
    }
}
