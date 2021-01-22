<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetSemesterPoint;
use Illuminate\Support\Facades\Cookie;

class SemesterPointController extends Controller
{
	public function index(Request $request)
	{
		//학기 점수 반환 클래스생성
		$get_semester_point = new GetSemesterPoint();

		//쿠키에서 학번 가져오기
		$studentID = $request->cookie('studentID');
		$response = $get_semester_point->GetSemesterPoint($studentID);

		//성적표 타이틀
		$titles = ['No', '교과목', '구분', '학점', '성적', '평점'];
		$Hakgi_tags = ['seq', 'subjectName', 'isugubun', 'subjetPoint', 'getPoint', 'getAvg'];
		//성적표 내부 정보
		$contents = array(
			array(
				array(),
				array(),
				array(),
				array(),
				array(),
				array(),
			)
		);
		$Hakgi_count = 0;
		$Subject_count = 0;
		$test = array(
			array()
		);
		$total_point = array(
			array(),
			array()
		);
		//성적표 내부 채우기
		foreach ($response as $Hakgi_index => $Hakgis) {
			$Subject_count = 0;
			$total_point[$Hakgi_count][0] = $Hakgis->GetHakgiPoint['avgPoint'];
			$total_point[$Hakgi_count][1] = $Hakgis->GetHakgiPoint['avgTotalPoint'];
			foreach ($Hakgis->List as $List_index => $list) {
				foreach ($list as $subject_index => $subject) {
					foreach ($Hakgi_tags as $tag_index => $Hakgi_tag) {
						$contents[$Hakgi_count][$Subject_count][$tag_index] = $subject[$Hakgi_tag];
					}
					$Subject_count++;
				}
			}
			$Hakgi_count++;
		}
		$curl = new CurlController();
		$data = array(
			'user_id' => Cookie::get('studentID')
		);
		$user_info = $curl->curlPost(env('URL_USER_INFO'), $data);
		$user_year = $user_info['year'];
		$years = array();
		for ($i = 1; $i <= (int)$user_year; $i++) {
			$years[$i] = $i;
		}
		$title = "성적";
		return view('Semester.SemesterPoint', compact('titles', 'contents', 'years', 'total_point', 'title'));
	}
}
