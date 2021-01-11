<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainCalendar extends Controller
{
	public function index(Request $request)
	{
		$url_id = env("URL_SCHEDULE") . Cookie::get("studentID");
		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환

		//curl response
		$json_response = curl_exec($ch);
		cURL_close($ch);
		$json_ = json_decode($json_response);

		$time_arr = $this->time_set();
		$contents_arr = $this->schedule_set($json_);

		//return dd($contents_arr);
		return view('Calendar.Calendar', compact('time_arr', 'contents_arr'));
	}

	function time_set()
	{
		$time = 9;
		$time_arr = [];
		while ($time < 19) {
			array_push($time_arr, $time . ":00~" . $time . ":30");
			array_push($time_arr, $time . ":30~" . ($time + 1) . ":00");
			$time += 1;
		}
		return $time_arr;
	}
	function schedule_set($jsons)
	{
		$week = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
		$arr = array(
			array(),
			array(),
			array(),
			array(),
			array()
		);
		$time_count = 0;
		foreach ($jsons as $json) {
			foreach ($week as $index => $day) {
				$arr[$index][$time_count] = $json->$day;
			}
			$time_count++;
		}
		return $arr;
	}
}