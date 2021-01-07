<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;

class SchoolNoticePage extends Controller
{
    public function index(Request $request){
        $notice = new SchoolNotice();
        $notice_datas = json_decode($notice->getNotice(1, 20)); // 메인 공지사항 제작
        return view('Notice.SchoolNotice', compact('notice_datas'));
    }
}
