<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolNoticePage extends Controller
{
	public function index(Request $request)
	{
		//상세 공지사항 주소
		$url_id = env("URL_NEWS_VIEW", false) . $request['id'];
		$curl = new CurlController();
		$response = $curl->curlGet($url_id);

		$data = $response;
		return view('Notice.SchoolNotice', compact('data'));
	}
}
