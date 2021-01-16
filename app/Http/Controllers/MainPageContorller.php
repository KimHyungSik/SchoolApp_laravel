<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;

class MainPageContorller extends Controller
{
	public function index(Request $request)
	{
		$notice = new SchoolNotice();
		$notice_datas = $notice->getNotice(1, 20); // 메인 공지사항 제작
		return view('Main.MainPage', compact('notice_datas'));
	}
}
