<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CurlController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;

//상세 게시판 생성
class DetailBoardPage extends Controller
{
	public function index(Request $request)
	{
		try {
			//curl 생성
			$curl = new CurlController();

			$board_id =  $request['id'];			//게시판 번호
			$student_id = Cookie::get('studentID'); //학번

			//상세 게시판 호출
			$url_id = env('URL_VIEW_BOARD');
			$data = array(
				'board_id' => $board_id
			);
			$response = $curl->curlPost($url_id, $data);
			$data = $response;

			if ($data['RESULT'] == '400') {
				return redirect()->back();
			}

			//내 게시판인지 확인
			$match_url_id = env('URL_MATCH_BOARD');
			$match_data = array(
				'user_id' => $student_id,
				'board_id' => $board_id
			);
			$match_response = $curl->curlPost($match_url_id, $match_data);
			$my_board = false;
			if ((string)$match_response['RESULT'] == "100") {
				$my_board = true;
			}

			//게시판 좋아요 확인
			$mylike_url_id = env('URL_MYLIKE_BOARD');
			$mylike_data = array(
				'board_id' => $board_id,
				'user_id' => $student_id
			);
			$mylike_response = $curl->curlPost($mylike_url_id, $mylike_data);
			$is_like = false;
			if ((string)$mylike_response['RESULT'] == "100") {
				$is_like = true;
			}

			return view('Board.DetailBoard', compact('data', 'student_id', 'my_board', 'board_id', 'is_like'));
		} catch (\Exception $e) {
			return redirect()->back();
		}
	}

	public function post_modified(Request $request)
	{
		//게시판 수정 전송
		$url_id = env('URL_MODIFIED_BOARD');
		$data = array(
			'student_id' => Cookie::get('studentID'),
			'board_id' => $request['id'],
			'board_title' => $request->title,
			'board_content' => $request->content
		);

		//curl생성
		$curl = new CurlController();
		$curl->curlPost($url_id, $data);

		//상세 게시판 호출
		return $this->index($request);
	}
}
