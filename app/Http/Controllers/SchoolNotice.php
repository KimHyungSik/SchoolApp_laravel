<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
			$ch = curl_init();
			$post_field_string = http_build_query($data, '', '&');
			curl_setopt($ch, CURLOPT_URL, env("URL_NEWS_LIST", false));                   //URL 지정하기
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                 //요청 결과를 문자열로 반환
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
			curl_setopt($ch, CURLOPT_POST, true);

			$response = curl_exec($ch);
			curl_close($ch);

			return $response;
		} catch (\Exception $e) {
			return $e;  //학번 검색 실패 시 기본화면으로 전환
		}
	}
}
