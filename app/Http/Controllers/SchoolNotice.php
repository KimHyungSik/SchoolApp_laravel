<?php

namespace App\Http\Controllers;

class SchoolNotice extends Controller
{
	//num, size 받아서 공지사항 json 반환
	public function getNotice($num, $size)
	{
		try {
			$data = array(
				'page_num' => $num,		// 페이지
				'page_size' => $size,	// 크기
			);
			$curl = new CurlController();
			$response = $curl->curlPost(env("URL_NEWS_LIST"), $data);
			return $response;
		} catch (\Exception $e) {
			return $e;
		}
	}
}
