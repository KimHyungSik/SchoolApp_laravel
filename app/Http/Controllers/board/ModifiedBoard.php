<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ModifiedBoard extends Controller
{
	public function index(Request $request)
	{
		try{
			$url_id = env('URL_VIEW_BOARD');
			$board_id =  $request['id'];

			$data = array(
				'board_id' => $board_id
			);

			$curl = new CurlController();
			$response = $curl->curlPost($url_id, $data);
			$data = $response;
			return view('Board.Modified', compact('data', 'board_id'));
		}catch (\Exception $e) {
			return $e;
		}
	}

	public function delete_board(Request $request)
	{
		$url_id = env('URL_DELETE_BOARD');
		$board_id =  $request['id'];

		$data = array(
			'board_id' => $board_id,
			'student_id' => Cookie::get('student'),
		);

		$curl = new CurlController();
		$response = $curl->curlPost($url_id, $data);
		$BoardList = new BoardList();
		return $BoardList->index($request);
	}
}
