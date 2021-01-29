<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CurlController;
use App\Http\Controllers\UserInfo;
use Illuminate\Support\Facades\Cookie;

class MyBoardList extends Controller
{
	public function get_index(Request $request)
	{
		$board_group = 0;
		$data = array(
			'board_group' => $board_group,
			'user_id' => Cookie::get('studentID'),
			'page_num' => 1,
			'page_size' => 25
		);

		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_MY_BOARD'), $data);

		$user_curl = new UserInfo();
		$user_name = $user_curl->user_name();

		//날짜 포멧
		$date_format = new BoardList();
		$date_list = $date_format->format_date($response);
		$title = "학부 게시판";

		return view('Board.MyBoard', compact('response', 'date_list', 'board_group', 'user_name', 'title'));
	}

	public function post_index(Request $request)
	{
		$board_group = $request->borad_group;
		$data = array(
			'board_group' => $board_group,
			'user_id' => Cookie::get('studentID'),
			'page_num' => 1,
			'page_size' => 25,
			'search_key' => $request->search_key,
			'search_value' => $request->search_value ? $request->search_value : "",
		);
		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_MY_BOARD'), $data);
		$user_curl = new UserInfo();
		$user_name = $user_curl->user_name();
		//날짜 포멧
		$date_format = new BoardList();
		$date_list = $date_format->format_date($response);

		$title = "학부 게시판";

		return view('Board.MyBoard', compact('response', 'date_list', 'board_group', 'user_name', 'title'));
	}
}
