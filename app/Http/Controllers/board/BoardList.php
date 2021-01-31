<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BoardList extends Controller
{
	//기본 가져오기
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

		//공지사항 가져오기
		$notice_data =  array(
			'board_group' => $board_group,
			'page_num' => 1,
			'page_size' => 4
		);
		$notice_response = $curl->curlPost(env('URL_NOTICE_LIST_BOARD'), $notice_data);
		$notice_date_list = $this->format_date($notice_response);
		$date_list = $this->format_date($response);
		return view('Board.BoardList', compact('response', 'search_text', 'board_group', 'notice_response', 'notice_date_list', 'date_list'));
	}

	//검색 시
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
		//검색시 공지 사항 제외
		$notice_response = [];
		$date_list = $this->format_date($response);
		return view('Board.BoardList', compact('response', 'search_text', 'board_group', 'notice_response', 'date_list'));
	}

	function format_date($date_list)
	{
		$format_date_list = array();
		$today = date("Y-m-d");
		foreach ($date_list as $index => $date) {
			$split_date = explode(' ', $date['time_write']);
			if (date('Y-m-d', strtotime($split_date[0])) == $today) {
				$format_date_list[$index] = date('H:i', strtotime($split_date[1]));
			} else {
				$format_date_list[$index] = date('m-d', strtotime($split_date[0]));
			}
		}
		return $format_date_list;
	}
}
