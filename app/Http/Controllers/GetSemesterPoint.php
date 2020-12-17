<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GetSemesterPoint extends Controller
{
    //학기 점수를 불러온 뒤 리턴
    private $url = "http://haksa.koreait.kr/appxml/";
    public function GetSemesterPoint(string $studentId){
        $url_id = $this->url.$studentId.".xml";         //url 생성
        try{
            //curl 설정
            $ch = curl_init();                                 //curl 초기화
            curl_setopt($ch, CURLOPT_URL, $url_id);            //URL 지정하기
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
            
            //curl response
            $xml_response = curl_exec($ch);
            cURL_close($ch);

            //xml 파싱
            $object = simplexml_load_string($xml_response);
            $List = $object->Hakgi;

            //출력 부분
           return $List;
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['msg', 'The Message']);  //학번 검색 실패 시 기본화면으로 전환
        }
    }
}
