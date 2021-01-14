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
			$data = array(
				'board_group' => $request->borad_group,
				'student_id' => $studentID,
				'board_title' => $request->title,
				'board_content' => $request->content,
				'board_is_notice' => $request->notice,
				'board_nickname' => $request->nickname
			);
			$post_field_string = http_build_query($data);

			$curl = new CurlController();
			$response = $curl->curlPost($url_id, $data);
			return redirect()->route('BoardDetail', ['id' => $response[0]['id']]);
		} catch (\Exception $e) {
			return 'Error';
		}
	}
}
