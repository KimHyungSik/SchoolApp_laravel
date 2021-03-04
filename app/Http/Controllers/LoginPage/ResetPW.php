<?php

namespace App\Http\Controllers\LoginPage;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;

class ResetPW extends Controller
{
	public function index(Request $request)
	{
		$resetStudentID = $request->resetStudentID;
		$inputSocialNumFirst = $request->inputSocialNumFirst;
		$inputSocialNumSecond = $request->inputSocialNumSecond;

		$fullSocialNum = $inputSocialNumFirst . $inputSocialNumSecond;

		$url_id = env('URL_RESET');
		$url_id = $url_id . $resetStudentID;

		$curl = new CurlController();

		$data = array(
			'socialNum' => $fullSocialNum,
		);

		$response = $curl->curlPost($url_id, $data);
		$error = true;

		if ($response[0]['RESULT'] == 100) {
			$errorTitle = "비밀번호가 초기화 되었습니다";
			$errorBody = "다시 로그인을 시도해 주세요.";

			return view('LoginPage', compact('error', 'errorTitle', 'errorBody'));
		}
		$errorTitle = "비밀번호 초기화 실패";
		$errorBody = "학번과 주민등록번호를 확인해주세요.";

		return view('LoginPage', compact('error', 'errorTitle', 'errorBody'));
	}
}
