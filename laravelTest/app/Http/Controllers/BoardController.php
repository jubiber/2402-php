<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function board(Request $request)
    {
        // 요청 처리 로직 작성
        return view('board'); // 예시로 board.blade.php 뷰를 반환
    }
    public function write(Request $request)
    {
        // 요청 처리 로직 작성
        return view('write'); // 예시로 board.blade.php 뷰를 반환
    }
    
    public function index()
    {

    }
   

    public function create(){

    }

    public function store(Request $request){

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function destroy($id){
        
    }


}
