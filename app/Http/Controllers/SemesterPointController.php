<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetSemesterPoint;
use Exception;
use Illuminate\Support\Facades\Cookie;

class SemesterPointController extends Controller
{
	public function index(Request $request)
	{
		try {
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
			$Hakgi_count = 0;		//학기 세기
			$Subject_count = 0;     //과목수 세기
			$total_point = array(	//총학점 계산
				array(),
				array()
			);
			$total_point_Hakjum = 0;
			$total_avg_point = 0;
			$Hakgi_year  = array();
			//성적표 내부 채우기
			foreach ($response as $Hakgi_index => $Hakgis) {
				$Subject_count = 0;
				$total_point[$Hakgi_count][0] = $Hakgis->GetHakgiPoint['avgPoint'];
				$total_point[$Hakgi_count][1] = $Hakgis->GetHakgiPoint['avgTotalPoint'];
				$total_point_Hakjum += $Hakgis->GetHakgiPoint['point'];
				$total_avg_point += $Hakgis->GetHakgiPoint['avgPoint'];
				if ($Hakgis['hakgi'] != null) {
					$Hakgi_year[$Hakgi_count] = $Hakgis['hakgi'];
				}
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
			$total_avg_point = $total_avg_point / (($Hakgi_count - 1) / 2);

			//학년 가져오기
			$curl = new CurlController();
			$data = array(
				'user_id' => Cookie::get('studentID')
			);
			$user_info = $curl->curlPost(env('URL_USER_INFO'), $data);

			$user_year = $user_info['year'];
			$title = $user_info['user_name'] . "님 성적";
			return view('Semester.SemesterPoint', compact('titles', 'contents', 'total_point', 'title', 'total_point_Hakjum', 'Hakgi_year'));
		} catch (Exception $e) {
			return view('errors.ErrorPage');
		}
	}
}
