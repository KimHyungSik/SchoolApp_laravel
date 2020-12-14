<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterPointController;
use App\Http\Controllers\LoginController;

Route::get('/',function () { 
    return view('welcome');
}) -> middleware('LoginCookie');

//학기 점수 확인 class 호출
Route::post('/SemesterPoint', [LoginController::class, 'index']) -> name('SemesterPoint');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
//로그인 후 제일 처음 페이지
Route::get('/Main', function(){
    return view('Main.MainPage');
}) -> middleware('MainLoginCookie') -> name('MainPage');