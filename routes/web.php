<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterPointController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

//학기 점수 확인 class 호출
Route::post('/SemesterPoint', [LoginController::class, 'index']) -> name('SemesterPoint');