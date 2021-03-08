<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EvalViewController extends Controller
{
	public function index(Request $request)
	{
		$url_id = env("URL_EVAL_LIST") . Cookie::Get('studentID') . '/1';
		$url_id_period = env("URL_EVAL_PERIOD") . Cookie::Get('studentID') . '/1';

		$curl = new CurlController();
		// 강의 평가 리스트
		$evalList = $curl->curlget($url_id);
		// 강의 평가 기간 확인
		$evalPeriod =  $curl->curlget($url_id_period);

		$title = "강의평가";
		$withinPeriod = false;
		if ($evalPeriod[0]['RESULT'] != 100) {
			return view('Evaluation.EvalList', compact('evalList', 'title', 'withinPeriod'));
		}

		// 강의 평가 기간 내인지 확인
		$nowDate = strtotime(date("YYYY-mm-dd"));
		$startDate = strtotime($evalPeriod[0]['s_time']);
		$endDate = strtotime($evalPeriod[0]['e_time']);

		if ($nowDate >= $startDate && $nowDate <= $endDate) {
			$withinPeriod = true;
		}

		return view('Evaluation.EvalList', compact('evalList', 'title', 'wihtinPeriod'));
	}
}
