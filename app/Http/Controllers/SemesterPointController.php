<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetSemesterPoint;

class SemesterPointController extends Controller
{
    public function index(Request $request){
        
        $get_semester_point = new GetSemesterPoint();

        $studentID = $request->cookie('studentID');

        $view = view('Semester.SemesterPoint');
        
        return dd($get_semester_point->GetSemesterPoint($studentID));
    }
}
