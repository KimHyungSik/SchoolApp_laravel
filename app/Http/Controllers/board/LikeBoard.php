<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LikeBoard extends Controller
{
	public function index(Request $request)
	{
		$url_id = env('URL_LIKE_BOARD');
		$data = array(
			'board_id' => $request['boardid'],
			'user_id' => Cookie::get('studentID')
		);
		$curl = new CurlController();
		$curl->curlPOst($url_id, $data);
		return redirect()->back();
	}
}
