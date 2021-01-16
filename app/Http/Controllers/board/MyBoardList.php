<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CurlController;
use Illuminate\Support\Facades\Cookie;

class MyBoardList extends Controller
{
	public function get_index(Request $request)
	{
		$data = array(
			'board_group' => 0,
			'user_id' => Cookie::get('studentID'),
			'page_num' => 1,
			'page_size' => 10
		);

		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_MY_BOARD'), $data);
		return view('Board.MyBoard', compact('response'));
	}

	public function post_index(Request $request)
	{
		$data = array(
			'board_group' => $request->borad_group,
			'user_id' => Cookie::get('studentID'),
			'page_num' => 1,
			'page_size' => 20,
			'search_key' => $request->search_key,
			'search_value' => $request->search_value ? $request->search_value : "",
		);
		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_MY_BOARD'), $data);
		return view('Board.MyBoard', compact('response'));
	}
}
