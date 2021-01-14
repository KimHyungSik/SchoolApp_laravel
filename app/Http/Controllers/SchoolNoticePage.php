<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolNoticePage extends Controller
{
	public function index(Request $request)
	{
		//상세 공지사항 주소
		$url_id = env("URL_NEWS_VIEW", false) . $request['id'];
		$curl = new CurlController();
		$response = $curl->curlGet($url_id);

		$data = $response[0];
		$content = $this->xmlentity_decode($data['content']);
		return view('Notice.SchoolNotice', compact('data', 'content'));
	}

	function xmlentity_decode($input)
	{
		$match = array('/&amp;/', '/&gt;/', '/&lt;/', '/&apos;/', '/&quot;/', '/&nbsp;/');
		$replace = array('&', '>', '<', '\'', '"', ' ');
		return preg_replace($match, $replace, $input);
	}
}
