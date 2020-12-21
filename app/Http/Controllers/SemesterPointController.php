<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetSemesterPoint;

class SemesterPointController extends Controller
{
    public function index(Request $request){
        //학기 점수 반환 클래스생성
        $get_semester_point = new GetSemesterPoint();

        //쿠키에서 학번 가져오기
        $studentID = $request->cookie('studentID');

        //$view = view('Semester.SemesterPoint');
        
        return dd($get_semester_point->GetSemesterPoint($studentID));
    }
}
