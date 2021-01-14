<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CurlController;

class DetailBoardPage extends Controller
{
	public function index(Request $request)
	{
		//상세 게시판 주소
		$url_id = env('URL_VIEW_BOADR');

		$data = array(
			'board_id' => $request['id']
		);

		$curl = new CurlController();
		$response = $curl->curlPost($url_id, $data);
		$data = $response[0];

		return view('Board.DetailBoard', compact('data'));
	}
}
