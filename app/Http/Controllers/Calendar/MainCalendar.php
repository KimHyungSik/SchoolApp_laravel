<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainCalendar extends Controller
{
	//rowsapn용 int 2차원 데이터
	private $row_array = array(
		array(),
		array(),
		array(),
		array(),
		array()
	);
	public function index(Request $request)
	{
		$id = $request->cookie('studentID');
		$url_id = env("URL_SCHEDULE") . $id;
		$ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환

		//curl response
		$json_response = curl_exec($ch);
		cURL_close($ch);

		$json_ = json_decode($json_response);

		$time_arr = $this->time_set();
		$contents_arr = $this->schedule_set($json_);
		$temp_row_array = $this->row_array;

		//return dd($contents_arr);
		return view('Calendar.Calendar', compact('time_arr', 'contents_arr', 'temp_row_array'));
	}

	//시간을 30분 단위로 나누어 배열
	private function time_set()
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

	private function schedule_set($jsons)
	{
		//요일별 매칭용
		$week = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
		//데이터 삽입용 2차원 배열
		$arr = array(
			array(),
			array(),
			array(),
			array(),
			array()
		);

		//요일 카운터
		$time_count = 0;
		//2차원 배열에 데이터를 채운다
		foreach ($jsons as $json) {
			foreach ($week as $index => $day) {
				$arr[$index][$time_count] = $json->$day;
				$this->row_array[$index][$time_count] = 1;
			}
			$time_count++;
		}

		$time_count = 0;
		//데이터를 검사 하여 rowspan용 temp_row_array를 채운다
		foreach ($jsons as $json) {
			if ($time_count > 18) {
				break;
			}
			foreach ($week as $index => $day) {
				$counter = 1;
				while ($arr[$index][$time_count] == $arr[$index][$time_count + $counter] && $arr[$index][$time_count] != "") {
					$this->row_array[$index][$time_count]++;
					$this->row_array[$index][$time_count + $counter] = 0;
					$arr[$index][$time_count + $counter] = "";
					$counter++;
				}
			}
			$time_count++;
		}
		return $arr;
	}
}
