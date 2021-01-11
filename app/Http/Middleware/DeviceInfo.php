<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DeviceInfo
{

	public function handle(Request $request, Closure $next)
	{
		$response = $next($request);

		$studentID = Cookie::get('studentID');

		//Devicec MODEL, OS_VERSION, clientIP
		$Model = Cookie::get('DeviceModel');
		$Version = Cookie::get('DeviceModel');
		$Client = Cookie::get('DeviceIP');




		return $response;
	}
}
