<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;

class BoardList extends Controller
{
	public function index(Request $request)
	{
		$data = array(
			'page_num' => $request['page'],
			'page_size' => 10,
			'board_group' => $request['group']
		);

		$curl = new CurlController();
		$response = $curl->curlPost(env('URL_LIST_BOADR'), $data);
		return view('Board.BoardList', compact('response'));
	}
}
