<?php
// php 에서 네임스페이스를 정의하는 구문임
// 네임스페이스는 코드의 일부를 구분하고 그룹화하는 데 사용됨
// 이 네임스페이스 내에서 정의된 클래스들은 "controller" 라는 이름으로 시작됨
namespace controller;

// Controller -> parents
class Controller {

    // 생성자
    // $action -> "loginGet"
    public function __construct($action) {


        // 세션 시작
        // (로그인 정보 저장)
        if(!isset($_SESSION)) {
            session_start(); 
        }

        // 유저 로그인 및 권한 체크
        // TODO: 나중에 추가

        // 해당 action 호출
        // $this -> loginGet();
        // $resultAction -> login.php
        $this->loginGet();
        $resultAction = $this->$action();
        
        // view 호출
        // TODO : 나중에 로케이션 처리도 되도록 수정
        require_once("view/".$resultAction);

        exit; // php 처리 종료
    }
}




