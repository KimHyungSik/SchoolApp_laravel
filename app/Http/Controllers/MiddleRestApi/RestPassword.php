<?php

namespace App\Http\Controllers\MiddleRestApi;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Exception;
use Illuminate\Http\Request;

class RestPassword extends Controller
{
	public function index(Request $request)
	{
		try {
			$resetStudentID = $request->ResetStudentID;
			$fullSocialNum = $request->FullSocialNum;

			$url_id = env('URL_RESET');
			$url_id = $url_id . $resetStudentID;

			$curl = new CurlController();

			$data = array(
				'socialNum' => $fullSocialNum,
			);

			$response = $curl->curlPost($url_id, $data);

			if ($response[0]['RESULT'] == 100) {
				return array("RESULT" => 100);
			}
			return array("RESULT" => 200);
		} catch (Exception $e) {
			return array("RESULT" => 400);
		}
	}
}
