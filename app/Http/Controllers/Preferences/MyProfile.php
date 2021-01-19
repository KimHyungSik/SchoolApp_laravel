<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MyProfile extends Controller
{
	public function index(Request $requets)
	{
		//post 데이터 준비
		//사용자 정보 조회
		$url_id = env('URL_USER_INFO');
		$student_id = Cookie::get('studentID');
		$data = array(
			'user_id' => $student_id
		);

		$curl = new CurlController();
		$response = $curl->curlPost($url_id, $data);
		return view('Preferences.MyProfile', compact('response', 'student_id'));
	}
}
