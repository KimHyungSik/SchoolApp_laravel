<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeviceInfo
{

	public function handle(Request $request, Closure $next)
	{
		$response = $next($request);

		// $studentID = Cookie::get('studentID');
		// //Devicec MODEL, OS_VERSION, clientIP
		// $Model = Cookie::get('DeviceModel');
		// $Version = Cookie::get('DeviceVersion');
		// $ip = $request->ip();
		// try {
		// 	DB::statement('CALL koreaitedu.log_login(?,?,?,?);', array($studentID, $ip, $Version, $Model));
		// } catch (\Throwable $th) {
		// 	Log::error($th);
		// }
		return $response;
	}
}
