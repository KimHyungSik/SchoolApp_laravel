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

		$curl = new CurlController();
		$response = $curl->curlGet($url_id);
		if ((string)$response[0]['RESULT'] != "100") {
			return "Login Error";
		}

		//로그인 성공시 쿠기 생성
		Cookie::queue(Cookie::make('studentID', $request->studentID, 60));

		//자동로그인 확인
		if ($request->auto_Login) {
			Cookie::queue(Cookie::make('studentID_saveServer', $request->studentID, 60));
		}

		Cookie::queue(Cookie::forget('studentID_delete'));
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
