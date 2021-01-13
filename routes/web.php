<?php

use App\Http\Controllers\board\WritingPage;
use App\Http\Controllers\Calendar\MainCalendar;
use App\Http\Controllers\SemesterPointController;
use App\Http\Controllers\MainPageContorller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Logout_;
use App\Http\Controllers\SchoolNoticePage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('LoginPage');
})->middleware('LoginCookie')->name('default');

//로그인 후 제일 처음 페이지
Route::get('/Main',  [MainPageContorller::class, 'index'])->middleware('CheckLoginCookie')->name('MainPage');

//일정
Route::get('/Calendar', [MainCalendar::class, 'index'])->middleware('CheckLoginCookie')->name('Calendar');

//학기 점수 확인 class 호출
Route::get('/SemesterPoint', [SemesterPointController::class, 'index'])->middleware('CheckLoginCookie')->name('SemesterPoint');

//일자리
Route::get('/Job', function () {
	Log::info(Cookie::get());
	return view('Job.Job');
})->middleware('CheckLoginCookie')->name('Job');

Route::get('/Preferences', function () {
	return view('Preferences.Preferences');
})->middleware('CheckLoginCookie')->name('Preferences');

//상세 공지사항
Route::get('/notice/{id}', [SchoolNoticePage::class, 'index'])->middleware('CheckLoginCookie')->name('Notice');

Route::get('/Board/Writing', [WritingPage::class, 'index'])->middleware('CheckLoginCookie')->name('Writing');

//로그인
Route::post('/LoginCheck', [LoginController::class, 'index'])->middleware('Deviceinfomation')->name('LoginControll');
Route::get('/LoginCheck', [LoginController::class, 'autoLogin'])->middleware('Deviceinfomation')->name('LoginControll');

//로그아웃
Route::get('/LogOut', Logout_::class)->middleware('CheckLoginCookie')->name('LogOut');
