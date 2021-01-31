<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchoolNotice;
use Exception;

class MainPageContorller extends Controller
{
	public function index(Request $request)
	{
		try {
			$notice = new SchoolNotice();
			$notice_datas = $notice->getNotice(1, 20); // 메인 공지사항 제작
			$notice_date = array();
			foreach ($notice_datas as $index => $notice_data) {
				$temp = explode('오', $notice_data['writeday']);
				$noteic_date[$index] = $temp[0];
			}

			return view('Main.MainPage', compact('notice_datas', 'noteic_date'));
		} catch (Exception $e) {
			return view('errors.ErrorPage');
		}
	}
}
