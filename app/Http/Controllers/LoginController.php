<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
	private function log_login(Request $request, $studentID, $res = null)
	{
		//Devicec MODEL, OS_VERSION, clientIP
		$ip = $request->ip();
		$Version = Cookie::get('DeviceVersion');
		$Model = Cookie::get('DeviceModel');
		Cookie::forget('DeviceVersion');
		Cookie::forget('DeviceVersion');
		$studentName = $college = $depart = $year = $role = $role_by = null;

		if ($res) {
			$studentName = $res[0]['studentName'];
			$year = $res[0]['gradeYear'];

			$sosok = $res[0]['sosokName'];
			$sosok_array = explode(' ', $sosok);
			$college = $sosok_array[0];
			$depart = $sosok_array[1];
		}

		try {
			$db_result = DB::select(
				'CALL koreaitedu.get_role(?);',
				array($studentID)
			);

			if ($db_result) {
				$role = $db_result[0]->role_id;
				$role_by = $db_result[0]->role_by;
			}

			DB::statement(
				'CALL koreaitedu.log_login(?,?,?,?,?,?,?,?,?);',
				array($studentID, $ip, $Version, $Model, $studentName, $sosok, $year, $role, $role_by)
			);
		} catch (\Throwable $th) {
			Log::error($th);
		}
	}

	public function index(Request $request)
	{
		$student_id = $request->studentID;
		$url_id = env("URL_LOGIN", false) . $student_id . '/' . $request->studentPassword;

		$curl = new CurlController();
		$response = $curl->curlGet($url_id);

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
		return redirect()->route('MainPage');
	}

	public function autoLogin(Request $request)
	{
		$studentID_save = Cookie::get('studentID_save');

		if ($studentID_save) {
			Cookie::queue(Cookie::make('studentID',  $studentID_save, 60));
			Cookie::queue(Cookie::forget('studentID_save'));
			$this->log_login($request, $studentID_save);
			return redirect()->route('MainPage');
		}
		return redirect()->route('default', ['error' => true]);
	}
}
