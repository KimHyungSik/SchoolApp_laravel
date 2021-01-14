<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
	public function index(Request $request)
	{
		$url_id = env("URL_LOGIN", false) . $request->studentID . '/' . $request->studentPassword;

		// try{
		//curl 설정
		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//curl response
		$json_response = curl_exec($ch);
		cURL_close($ch);

		$decode_response = json_decode($json_response);

		if ((string)$decode_response[0]['RESULT'] != "100") {
			return redirect()->back()->withErrors(['msg', 'The Message']);
		}

		//로그인 성공시 쿠기 생성
		Cookie::queue(Cookie::make('studentID', $request->studentID, 60));

		//자동로그인 확인
		if ($request->auto_Login) {
			Cookie::queue(Cookie::make('studentID_saveServer', $request->studentID, 60));
		}

		Cookie::queue(Cookie::forget('studentID_delete'));

		$notice = new SchoolNotice();
		$notice_datas = json_decode($notice->getNotice(1, 50)); // 메인 공지사항 제작

		$view = view('Main.MainPage', compact('notice_datas'));
		return redirect()->route('MainPage');
	}

	public function autoLogin(Request $request)
	{
		$studentID_save = Cookie::get('studentID_save');

		if ($studentID_save) {
			Cookie::queue(Cookie::make('studentID',  $studentID_save, 60));
			Cookie::queue(Cookie::forget('studentID_save'));
			return redirect()->route('MainPage');
		}
		return redirect()->route('default');
	}
}
