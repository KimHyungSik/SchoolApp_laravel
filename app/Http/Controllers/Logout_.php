<?php

namespace App\Http\Controllers;

class Logout_ extends Controller
{
    public function __invoke()
    {
        $cookie_forget = \Cookie::forget('studentID');
        return redirect('/') -> withCookie($cookie_forget);;
    }
}
