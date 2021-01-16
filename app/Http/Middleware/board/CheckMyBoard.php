<?php

namespace App\Http\Middleware\board;

use App\Http\Controllers\CurlController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckMyBoard
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
		$curl = new CurlController();
		$match_url_id = env('URL_MATCH_BOARD');
		$match_data = array(
			'student_id' => Cookie::get('studentID'),
			'board_id' => $request['id']
		);
		$match_response = $curl->curlPost($match_url_id, $match_data);

		if ((string)$match_response['RESULT'] == "100") {
			return $next($request);
		}
		return redirect()->back();
	}
}
