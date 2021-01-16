<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CurlController;
use Illuminate\Support\Facades\Cookie;

class DetailBoardPage extends Controller
{
	public function index(Request $request)
	{
		try {
			//상세 게시판 주소
			$url_id = env('URL_VIEW_BOARD');
			$board_id =  $request['id'];

			$data = array(
				'board_id' => $board_id
			);

			$curl = new CurlController();
			$response = $curl->curlPost($url_id, $data);
			$data = $response[0];

			$match_url_id = env('URL_MATCH_BOARD');
			$match_data = array(
				'student_id' => Cookie::get('studentID'),
				'board_id' => $board_id
			);
			$match_response = $curl->curlPost($match_url_id, $match_data);

			$my_board = false;
			if ((string)$match_response['RESULT'] == "100") {
				$my_board = true;
			}
			return view('Board.DetailBoard', compact('data', 'my_board', 'board_id'));
		} catch (\Exception $e) {
			return redirect()->back();
		}
	}

	public function post_modified(Request $request)
	{
		$url_id = env('URL_MODIFIED_BOARD');
		$data = array(
			'student_id' => Cookie::get('studentID'),
			'board_id' => $request['id'],
			'board_title' => $request->title,
			'board_content' => $request->content
		);

		$curl = new CurlController();
		$response = $curl->curlPost($url_id, $data);
		return $this->index($request);
	}
}
