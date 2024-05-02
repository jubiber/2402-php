<?php
// 라우터 -> 컴퓨팅 디바이스와 네트워크를 다른 네트워크에 연결하는 네트워킹 디바이스임
namespace router;

use controller\UserController;
use controller\BoardController;

// 라우터 : 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
class Router {
    // 생성자
    public function __construct() {
        // URL 규칙
		// 1. 회원 관련 URL
		//		user/[액션]
		//		ex) 로그인 : 도메인/user/login
		//		ex) 회원가입 : 도메인/user/regist
		// 2. 게시판 관련 URL
		//		board/[액션]
		//		ex) 리스트 : 도메인/board/list
		//		ex) 수정 : 도메인/board/edit

        $url = $_GET["url"]; // url 획득
        // HTTP 메소드는 클라우드가 서버에게 요청을 보낼 때 사용하는 동작을 정의함
        $httpMethod = $_SERVER["REQUEST_METHOD"]; // HTTP 메소드 획득

        // url 체크
        if($url === "user/login") {
            // 회원 로그인 관련
            if($httpMethod === "GET") {
                new UserController("loginGet");
            } else {
                new UserController("loginPost");
            }
        } else if($url === "board/list") {
            // 게시글 페이지 관련
            if($httpMethod === "GET") {
                new BoardController("listGet");
            }
        } else if($url === "user/logout") {
            // 로그아웃 처리
            if($httpMethod === "GET") {
                new UserController("logoutGet");
            }
        } else if($url === "board/add") {
            // 게시글 작성 관련
            if($httpMethod === "POST") {
                new BoardController("addPost");
            }
        } else if($url === "board/detail") {
            // 상세 페이지
            if($httpMethod === "GET") {
                new BoardController("detailGet");
            }
        }

        // 예외 처리
        echo "잘못된 URL : ".$url;
        exit;
    }
}