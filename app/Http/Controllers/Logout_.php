<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class Logout_ extends Controller
{
	public function __invoke()
	{
		$cookie_forget = Cookie::forget('studentID');
		Cookie::queue(Cookie::make('studentID_delete', "", 1));
		return redirect('/')->withCookie($cookie_forget);;
	}
}
