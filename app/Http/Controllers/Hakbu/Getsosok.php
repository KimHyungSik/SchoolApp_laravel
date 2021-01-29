<?php

namespace App\Http\Controllers\Hakbu;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;

class Getsosok extends Controller
{
	public function getSosok()
	{
	}

	public function getMajor()
	{
		$url_id = env('URL_MAJOR');
		$curl = new CurlController();
		$response = $curl->curlGet($url_id);
		return $response;
	}
}
