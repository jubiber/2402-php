<?php
// 라우터에서 실제적으로 동작? 하고있는거
// namespace: 클래스가 위치하고있는 주소라고 생각하면 됨
// 주의: 역슬러쉬로 적어야 함.
// 라우터라는 네임스페이스를 선언하는 것
namespace router;

use controller\UserController;
use controller\BoardController;
// router: 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
// 클래스 라우터는 생성자dhk test메소드를 포함한다.
class Router {
    // 생성자
    public function __construct() {
        // url 규칙
        // 1. 회원 정보 관련 URL
            // user/[액션]
            // ex) 로그인 : 도메인/user/login
            // ex) 회원가입 : 도메인/user/regist
        // 2. 게시판 관련 URL
            // board/[액션]
            // ex) 리스트: 도메인/board/list
            // ex) 수정 : 도메인/board/edit


        $url = $_GET['url']; // url 획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; // HTTP 메소드 획득
        
        // url 체크
        if ($url === "user/login") {
            // 회원 로그인 관련
            if($httpMethod === "GET") {
                new UserController("loginGet");
            }
            else {
                new UserController("loginPost");
            }
        } else if($url === "board/list") {
            // 게시글 페이지 관련
            if($httpMethod === "GET") {
                // 파라미터 LISTGET BOARDCONTROLLER -> 생성자
                new BoardController("listGet");
            }
        }
        

        // 예외 처리
        echo "잘못된 URL : ".$url;
        exit;
    }
}

