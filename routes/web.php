<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterPointController;
use App\Http\Controllers\MainPageContorller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Logout_;
use App\Http\Controllers\SchoolNoticePage;


//기본
Route::get('/', function () {
	return view('LoginPage');
})->middleware('LoginCookie');

//로그인 후 제일 처음 페이지
Route::get('/Main',  [MainPageContorller::class, 'index'])->middleware('CheckLoginCookie')->name('MainPage');

//일정
Route::get('/Calendar', function () {
	return view('Calendar.Calendar');
})->middleware('CheckLoginCookie')->name('Calendar');

//학기 점수 확인 class 호출
Route::get('/SemesterPoint', [SemesterPointController::class, 'index'])->middleware('CheckLoginCookie')->name('SemesterPoint');

//일자리
Route::get('/Job', function () {
	return view('Job.Job');
})->middleware('CheckLoginCookie')->name('Job');

Route::get('/Preferences', function () {
	return view('Preferences.Preferences');
})->middleware('CheckLoginCookie')->name('Preferences');


//상세 공지사항
Route::get('/notice/{id}', [SchoolNoticePage::class, 'index'])->middleware('CheckLoginCookie')->name('Notice');

//로그인 버튼 클릭시 로그인 확인 및 메인페이지 생성
Route::post('/LoginCheck', [LoginController::class, 'index'])->middleware('DeviceInfomation')->name('LoginControll');

//로그아웃
Route::get('/LogOut', Logout_::class)->middleware('CheckLoginCookie')->name('LogOut');
