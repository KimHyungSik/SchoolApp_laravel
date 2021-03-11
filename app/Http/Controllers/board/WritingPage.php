<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WritingPage extends Controller
{
	public function index(Request $request)
	{
		return view('Board.WritingPage');
	}

	public function post_board(Request $request)
	{
		try {
			$url_id = env("URL_WRITEING_BOARD");
			$studentID = Cookie::get('studentID');
			$board_group = $request->board_group;
			$data = array(
				'board_group' => $board_group,
				'user_id' => $studentID,
				'board_title' => $request->title,
				'board_content' => $request->content,
				'board_is_notice' => $request->notice
			);

			$curl = new CurlController();
			$response = $curl->curlPost($url_id, $data);
			return redirect()->route('BoardDetail', ['id' => $response['board_id'], 'group' => $board_group]);
		} catch (\Exception $e) {
			return view('errors.ErrorPage');
		}
	}
}
