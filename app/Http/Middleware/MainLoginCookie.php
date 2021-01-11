<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

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
		$studentID = Cookie::get('studentID');
		$studentID_save = Cookie::get('studentID_save');

		//자동 로그인 쿠키가 있다면 로그인 인증
		if ($studentID_save) {
			Cookie::queue(Cookie::make('studentID',  $studentID_save));
			Cookie::queue(Cookie::forget('studentID_save'));
			return $next($request);
		}

		if ($studentID == null) {
			return redirect('/');
		}
		return $next($request);
	}
}
