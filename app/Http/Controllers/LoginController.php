<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $url = "http://haksa.koreait.kr/article/login/";
    public function index(Request $request){
        $url_id = $this->url.$request->studentID.'/'.$request->studentPassword;

        // try{
            //curl 설정
            $ch = curl_init();                                 //curl 초기화
            curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
            
            //curl response
            $json_response = curl_exec($ch);
            cURL_close($ch);

            $decode_response = json_decode($json_response);

            if((string)$decode_response[0]->RESULT != "100"){
                return redirect()->back()->withErrors(['msg', 'The Message']);  
            }
            
            //로그인 성공시 쿠기 생성
            $cookie = \Cookie::make('studentID', $request->studentID, 60);   
            $view = view('Main.MainPage');

            return response($view)-> withCookie($cookie);
        // }catch (\Exception $e){
        //     return "Error";  
        // }
    }
}
