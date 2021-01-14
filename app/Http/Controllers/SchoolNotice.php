<?php

namespace App\Http\Controllers;

class SchoolNotice extends Controller
{
	//num, size 받아서 공지사항 json 반환
	public function getNotice($num, $size)
	{
		try {
			$data = array(
				'page_num' => $num,
				'page_size' => $size,
			);
			$curl = new CurlController();
			$response = $curl->curlPost(env("URL_NEWS_LIST"), $data);
			return $response;
		} catch (\Exception $e) {
			return $e;
		}
	}
}
