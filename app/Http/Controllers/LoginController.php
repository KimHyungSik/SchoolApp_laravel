<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

	public function index(Request $request)
	{
		$student_id = $request->studentID;
		$url_id = env("URL_LOGIN", false) . $student_id . '/' . $request->studentPassword;

		$curl = new CurlController();
		$response = $curl->curlGet($url_id);

		//로그인 실패 확인
		if ((string)$response[0]['RESULT'] != "100") {
			return view('LoginPage', ['error' => true]);
		}
		//로그인 성공시 쿠기 생성
		Cookie::queue(Cookie::make('studentID', $student_id, 60));
		Cookie::queue(Cookie::make('studentID_temp', $student_id, 1));
		//자동로그인 확인
		if ($request->auto_Login) {
			Cookie::queue(Cookie::make('studentID_saveServer', $student_id, 60));
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
		return redirect()->route('default', ['error' => true]);
	}
}
