<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterPointController;
use App\Http\Controllers\LoginController;

Route::get('/',function () { 
    return view('welcome');
}) -> middleware('LoginCookie');

//학기 점수 확인 class 호출
//Route::post('/SemesterPoint', [LoginController::class, 'index']) -> middleware('CheckLoginCookie')  -> name('SemesterPoint');


Route::post('/LoginCheck', [LoginController::class, 'index']) -> name('LoginControll');

//로그인 후 제일 처음 페이지
Route::get('/Main', function(){
    return view('Main.MainPage');
}) -> middleware('CheckLoginCookie') -> name('MainPage');
