<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolNoticePage extends Controller
{
	public function index(Request $request)
	{
		//상세 공지사항 주소
		$url_id = env("URL_NEWS_VIEW", false) . $request['id'];

		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환

		$response = curl_exec($ch);
		curl_close($ch);

		$data = json_decode($response, true);
		return view('Notice.SchoolNotice', compact('data'));
	}
}
