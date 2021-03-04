<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
	private function log_login(Request $request, $user_id, $res = null)
	{
		//Devicec MODEL, OS_VERSION, clientIP
		$ip = $request->ip();
		$os = Cookie::get('DeviceVersion');
		$device = Cookie::get('DeviceModel');

		try {
			$db_result = DB::select(
				'CALL koreaitedu.log_login(?,?,?,?);',
				array(
					$user_id,
					$ip,
					$os,
					$device,
				)
			);
			if ($db_result[0]->RESULT != 100) {
				Log::info('사용자 없음');
			}
		} catch (\Throwable $th) {
			Log::error($th);
		}

		$user_name = $college = $depart = $year = null;

		if ($res) {
			$user_name = $res[0]['studentName'];
			$year = $res[0]['gradeYear'];

			$sosok = $res[0]['sosokName'];
			$sosok_array = explode(' ', $sosok);
			$college = $sosok_array[0];
			$depart = $sosok_array[1];

			try {
				$db_result = DB::select(
					'CALL koreaitedu.user_get_info(?);',
					array($user_id)
				);
				if (
					$db_result[0]->user_name != $user_name ||
					$db_result[0]->college != $college ||
					$db_result[0]->depart != $depart ||
					$db_result[0]->year != $year
				) {
					DB::select(
						'CALL koreaitedu.user_set_info(?,?,?,?,?);',
						array(
							$user_id,
							$user_name,
							$college,
							$depart,
							$year
						)
					);
				}
			} catch (\Throwable $th) {
				Log::error($th);
			}
		}
	}

	public function Fbtok($studentID)
	{
		$Fbtok = Cookie::get('FBTOK');
		if ($Fbtok) {
			return $Fbtok;
			$data = array(
				'user_id' => $studentID,
				'firebase_key' => $Fbtok
			);
			$curl = new CurlController();
			$url_id = env('URL_SET_FCM');
			$curl->curlPost($url_id, $data);
		}
		return;
	}

	public function index(Request $request)
	{
		$student_id = $request->studentID;
		$url_id = env("URL_LOGIN", false) . $student_id . '/' . $request->studentPassword;

		$curl = new CurlController();
		$response = $curl->curlGet($url_id);

		$errorTitle = "로그인 실패";
		$errorBody = "학번과 비밀번호를 확인해주세요.";

		if ((string)$response[0]['RESULT'] != "100") {
			$error = true;
			return view('LoginPage', compact('error', 'errorTitle', 'errorBody'));
		}
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
		$this->log_login($request, $student_id, $response);
		//$this->Fbtok($student_id);
		return redirect()->route('MainPage');
	}

	public function autoLogin(Request $request)
	{
		$studentID_save = Cookie::get('studentID_save');

		try {
			Cookie::queue(Cookie::make('studentID',  $studentID_save, 60));
			Cookie::queue(Cookie::forget('studentID_save'));
			$this->log_login($request, $studentID_save);
			return redirect()->route('MainPage');
		} catch (\Throwable $th) {
			Log::error($th);
		}
		return redirect()->route('default', ['error' => true]);
	}
}
