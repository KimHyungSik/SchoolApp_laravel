<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterPointController;
use App\Http\Controllers\MainPageContorller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Logout_;
use App\Http\Controllers\SchoolNoticePage;

Route::get('/',function () { 
    return view('LoginPage');
}) -> middleware('LoginCookie');

//로그인 후 제일 처음 페이지
Route::get('/Main',  [MainPageContorller::class, 'index']) -> middleware('CheckLoginCookie') -> name('MainPage');

Route::get('/Calendar', function (){
    return view('Calendar.Calendar');
}) -> middleware('CheckLoginCookie') -> name('Calendar');

//학기 점수 확인 class 호출
Route::get('/SemesterPoint', [SemesterPointController::class, 'index']) -> middleware('CheckLoginCookie')  -> name('SemesterPoint');

Route::get('/Job', function(){
    return view('Job.Job');
}) -> middleware('CheckLoginCookie') -> name('Job');

Route::get('/Preferences', function (){
    return view('Preferences.Preferences');
}) -> middleware('CheckLoginCookie') -> name('Preferences');


Route::get('/SchoolNotice', [SchoolNoticePage::class, 'index'])-> middleware('CheckLoginCookie') -> name('Notice');

Route::post('/LoginCheck', [LoginController::class, 'index']) -> middleware('Deviecinfomation') -> name('LoginControll');

Route::get('/LogOut', Logout_::class) -> middleware('CheckLoginCookie') -> name('LogOut');