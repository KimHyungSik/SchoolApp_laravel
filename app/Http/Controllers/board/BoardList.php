<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BoardList extends Controller
{
	public function index(Request $request)
	{
		$board_group = $request['group'];
		$data = array(
			'page_num' => $request['page'],
			'page_size' => 10,
			'board_group' => $board_group,
			'search_key' => "title",
			'search_value' => ""
		);

		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_LIST_BOARD'), $data);
		$search_text = false;

		$notice_data =  array(
			'board_group' => $board_group,
			'page_num' => 1,
			'page_size' => 4
		);
		$notice_response = $curl->curlPost(env('URL_NOTICE_LIST_BOARD'), $notice_data);

		return view('Board.BoardList', compact('response', 'search_text', 'board_group', 'notice_response'));
	}

	public function post_index(Request $request)
	{
		$search_text = $request->search_text ? $request->search_text : "";
		$board_group = $request['group'];
		$data = array(
			'page_num' => 1,
			'page_size' => 10,
			'board_group' => $board_group,
			'search_key' => $request->search_key,
			'search_value' => $search_text,
		);

		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_LIST_BOARD'), $data);
		$notice_response = [];
		return view('Board.BoardList', compact('response', 'search_text', 'board_group', 'notice_response'));
	}
}
