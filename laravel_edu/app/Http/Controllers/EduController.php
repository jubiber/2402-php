<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduController extends Controller
{
    // index() 함수 정의 : 이 함수는 라우트에 의해 호출됨
    public function index() {
        // 연관 배열 '$arr' 생성
        $arr = [
            // 'id' 키에 1을 할당
            'id' => 1
            ,'name' => '홍길동'
            ,'tel' => '01099998888'
        ];
        // 'edu' 뷰를 반환
        return view('edu')
        // 뷰로 데이터 전달: 'gender' 키에 배열 'asd'을 전달
            ->with('gender', 'asd')
            ->with('data', $arr)
            ->with('data2', []);
    }
}
