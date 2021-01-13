<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WritingPage extends Controller
{
	public function index(Request $request)
	{
		return view('Board.WritingPage');
	}
}
