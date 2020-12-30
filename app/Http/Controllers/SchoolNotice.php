<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolNotice extends Controller
{
    public function index(Requeset $request){
        return view('SchoolNotice');
    }
}
