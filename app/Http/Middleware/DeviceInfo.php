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

		return $response;
	}
}
