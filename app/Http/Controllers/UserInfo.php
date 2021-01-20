<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserInfo extends Controller
{
	//현재 로그인 유저 정보를 불러와서 반환
	function user_info()
	{
		$curl = new CurlController();
		$url_id = env("URL_USER_INFO");
		$data = array(
			'user_id' => Cookie::get('studentID')
		);
		return $curl->curlPost($url_id, $data);
	}
}
