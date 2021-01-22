<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainCalendar extends Controller
{
	private $row_array = array(
		array(),
		array(),
		array(),
		array(),
		array()
	);
	private $class_array = array(
		array(),
		array(),
		array(),
		array(),
		array()
	);
	private $professor_array = array(
		array(),
		array(),
		array(),
		array(),
		array()
	);
	private $classroom_array = array(
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
		$temp_class_array = $this->class_array;
		$temp_professor_array = $this->professor_array;
		$temp_classroom_array = $this->classroom_array;
		$title = "KOREAIT 시간표";

		//return dd($contents_arr);
		return view('Calendar.Calendar', compact('time_arr', 'contents_arr', 'temp_row_array', 'title', 'temp_class_array', 'temp_professor_array', 'temp_classroom_array'));
	}

	function time_set()
	{
		$time = 9;
		$time_arr = [];
		while ($time < 19) {
			array_push($time_arr, $time . ":00"); //~" . $time . ":30");
			//array_push($time_arr, $time . ":30"); //~" . ($time + 1) . ":00");
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
				if ($json->$day != "") {
					$split_subject = explode('|', $json->$day);
					$split_subject[0] = str_replace(" ", "</br>", $split_subject[0]);
					$split_subject[1] = str_replace(" ", "</br>", $split_subject[1]);
					$arr[$index][$time_count] = $split_subject[0];
					$this->professor_array[$index][$time_count] = $split_subject[1];
					$this->classroom_array[$index][$time_count] = $split_subject[2];
				}
				$this->row_array[$index][$time_count] = 1;
				$this->class_array[$index][$time_count] = 0;
			}
			$time_count++;
		}

		$time_count = 0;
		$class_count = 1;
		$class_flag = 0;
		foreach ($jsons as $json) {
			if ($time_count > 18) {
				break;
			}
			foreach ($week as $index => $day) {
				$counter = 1;
				while ($arr[$index][$time_count] == $arr[$index][$time_count + $counter] && $arr[$index][$time_count] != "") {
					$class_flag = 1;
					$this->class_array[$index][$time_count] = $class_count;
					$this->row_array[$index][$time_count]++;
					$this->row_array[$index][$time_count + $counter] = 0;
					$arr[$index][$time_count + $counter] = "";
					$counter++;
				}
				if ($class_flag == 1) {
					$class_count++;
					$class_flag = 0;
				}
			}
			$time_count++;
		}
		return $arr;
	}
}
