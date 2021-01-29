<?php

namespace App\Http\Controllers\Hakbu;

use App\Http\Controllers\board\BoardList;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;

class HakbuBoardList extends Controller
{
	public function index(Request $request)
	{
		$curl = new CurlController();

		//학부 리스트 가져오기
		$getSosok = new Getsosok();
		$majorList = $getSosok->getMajor();

		$board_major_group = $request['major'];

		//검색 기록 없음 초기화
		$search_text = false;

		//초기 학부 리스트 가져오기
		$hakbu_list_uri_id = env('URL_LIST_HAKBU_BOARD');
		if ($board_major_group == 'B') {
			$board_major_group = 4;
		}

		$mojor_split = explode('스쿨', $majorList[(int)$board_major_group - 1]['sosokName']);

		$hakbu_list_data = array(
			'college' => $mojor_split[0],
			'page_num' => 1,
			'page_size' => 10
		);
		$hakbu_list_response = $curl->curlPost($hakbu_list_uri_id, $hakbu_list_data);

		//날짜 포멧
		$Date_Fomat = new BoardList();
		$date_list = $Date_Fomat->format_date($hakbu_list_response);
		return view('Hakbu.HakbuBoardList', compact('majorList', 'search_text', 'hakbu_list_response', 'date_list'));
	}

	public function post_index(Request $request)
	{
		$curl = new CurlController();

		//학부 리스트 가져오기
		$getSosok = new Getsosok();
		$majorList = $getSosok->getMajor();

		//검색 기록
		$search_text = $request->search_text ? $request->search_text : "";
		$board_major_group = $request['major'];

		//초기 학부 리스트 가져오기
		$hakbu_list_uri_id = env('URL_LIST_HAKBU_BOARD');

		//학부 '스쿨' 문자열 제거
		$mojor_split = explode('스쿨', $majorList[(int)$board_major_group]['sosokName']);

		$hakbu_list_data = array(
			'college' => $mojor_split[0],
			'page_num' => 1,
			'page_size' => 10
		);
		$hakbu_list_response = $curl->curlPost($hakbu_list_uri_id, $hakbu_list_data);

		//날짜 포멧
		$Date_Fomat = new BoardList();
		$date_list = $Date_Fomat->format_date($hakbu_list_response);
		return view('Hakbu.HakbuBoardList', compact('majorList', 'search_text', 'hakbu_list_response', 'date_list'));
	}
}
