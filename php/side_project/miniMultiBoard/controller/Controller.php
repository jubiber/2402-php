<?php
//name -> 프로그램에서 사용되는 이름의 논리적 그룹인 식별자의 컨텍스트
//
//controller -> 제어하다.
namespace controller;

use model\BoardsnameModel; 

class Controller {
    //내부 상속
    protected $arrErrorMsg = []; // 화면에 표시할 에러 메세지 리스트
    protected $arrBoardsNameInfo = []; // 헤더 게시판 드롭다운 리스트
    protected $boardName = ""; // 게시판이름 

    // 비로그인시 접속 불가능한 URL 리스트
    // private -> 내부만. 상속x
    private $arrNeedAuth = [
        // 자유게시판을 의미
        "board/list"
    ];

    // 생성자
    public function __construct($action) {

        // 세션 시작
        // 쿠키 -> 알아서 setting 해줌
        //세션 사용만 하면 됨
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크 (권한 메소드)
        // TODO : 나중에 추가
        //chk 어쩌고가 메소드임.
        $this->chkAuthorization();

        // 헤더 드롭다운 리스트 획득
        $modelBoardname = new BoardsnameModel();
        $this->arrBoardsNameInfo = $modelBoardname->getBoardsnameList();
        $modelBoardname->destroy();

        // 해당 action 호출
        // this -> loginGet(Post)을 호출한는거임
        $resultAction = $this->$action();

        // view 호출
        // TODO : 나중에 로케이션 처리도 되도록 수정
        // view  에 있는 login.php 파일을 불러옴

        $this->callView($resultAction);
        exit; // php 처리 종료
    }

    // 뷰 OR 로케이션 처리용 메소드
    // private function callView($path) {
    //     if(strpos($path, "Location:") === 0) {
    //         header($path);
    //     } else {
    //         require_once("view/".$path);
    //     }
    // }
    private function callView($path) {
        if ($path !== null && strncmp($path, "Location:", strlen("Location:")) === 0) {
            header($path);
        } else {
            require_once("view/".$path);
        }
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"]; // 접속 url 획득

        // 접속 권한이 없는 페이지 접속 차단
        //저장 안돼있으니까 false 에 ! 그니까 true, 뒤에 보드/리스트가 
        // W쩃든 in array 뒤도 true가 됨
        if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth)) {
            $this->arrErrorMsg[] = "로그인이 필요합니다";
            //HTTP헤더를 이용하여 사용자를 로그인 페이지로 리디렉션합니다.
            header("Location: /user/login");
            //중지
            exit;    
        }
        // 로그인한 상태에서 로그인 페이지 접속시 board/list로 이동
        // 해석 -> 로그인 했는데 또 로그인 되지 않도록.
        if(isset($_SESSION["u_id"]) && $url === "user/login") {
            header("Location: /board/list");
            exit;
        }
    }
}