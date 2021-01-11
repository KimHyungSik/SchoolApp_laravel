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
		$url_id = env("URL_LOGIN", false) . $request->studentID . '/' . $request->studentPassword;

		// try{
		//curl 설정
		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환

		//curl response
		$json_response = curl_exec($ch);
		cURL_close($ch);

		$decode_response = json_decode($json_response);

		if ((string)$decode_response[0]->RESULT != "100") {
			return redirect()->back()->withErrors(['msg', 'The Message']);
		}

		//로그인 성공시 쿠기 생성
		$cookie = Cookie::make('studentID', $request->studentID, 60);

		//자동로그인 확인
		if ($request->auto_Login) {
			Cookie::queue(Cookie::make('studentID_save', $request->studentID, 60));
		}

		Cookie::queue(Cookie::forget('studentID_delete'));

		$notice = new SchoolNotice();
		$notice_datas = json_decode($notice->getNotice(1, 50)); // 메인 공지사항 제작

		$view = view('Main.MainPage', compact('notice_datas'));

		$studentID = Cookie::get('studentID');
		//Devicec MODEL, OS_VERSION, clientIP
		$Model = Cookie::get('DeviceModel');
		$Version = Cookie::get('DeviceVersion');
		$ip = $request->ip();
		try {
			DB::statement('CALL koreaitedu.log_login(?,?,?,?);', array($request->studentID, $ip, $Version, $Model));
		} catch (\Throwable $th) {
			Log::error($th);
		}

		return response($view)->withCookie($cookie);
		// }catch (\Exception $e){
		//     return "Error";
		// }
	}
}
