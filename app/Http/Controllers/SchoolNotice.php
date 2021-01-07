<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SchoolNotice extends Controller
{

    private $url_id = "http://haksa.koreait.kr/article/news/list/";
    //num, size 받아서 공지사항 json 반환
    public function getNotice($num, $size){
        try{
            $data = array(
                'page_num' => $num,
                'page_size' => $size,
                'search_key' => 'title',
                'search_value' => '공지'
            );
            $ch = curl_init();
            $post_field_string = http_build_query($data, '', '&');
            curl_setopt($ch, CURLOPT_URL, $this->url_id);                   //URL 지정하기
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                 //요청 결과를 문자열로 반환
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
            curl_setopt($ch, CURLOPT_POST, true);
            
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }catch (\Exception $e){
            return $e;  //학번 검색 실패 시 기본화면으로 전환
        }
    }

}
