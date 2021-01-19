<?php

namespace App\Http\Controllers;

class CurlController extends Controller
{
	public function curlPost($url_id, $post_data, $ssl = false)
	{
		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $ssl);    //https 인증서 무시
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
		$response = curl_exec($ch);
		curl_close($ch);
		return json_decode($response, true);
	}

	public function curlGet($url_id, $ssl = false)
	{
		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $ssl);   //https 인증서 무시
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환

		$response = curl_exec($ch);
		curl_close($ch);
		return json_decode($response, true);
	}
}
