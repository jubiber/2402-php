<?php
namespace controller;

use model\UsersModel; 
use lib\UserValidator; 

class UserController extends Controller {
    // 로그인 페이지로 이동
    protected function loginGet() {
        return "login.php"; // 로그인 페이지 파일명 반환
    }

    // 로그인 처리
    protected function loginPost() {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
            ,"u_pw" => $_POST["u_pw"]
        ];
        
        // 유효성 체크(validator -> 코드의 구문 오류를 검사하는 프로그램)
        // TODO : 나중에 구현
        // '$requestData'를 이용하여 'UserValidator' 클래스의 'chkValidator' 메소드를
        // 호출하고, 반환값을 '$resultValidator' 변수에 할당한다.
        $resultValidator = UserValidator::chkValidator($requestData);
        
        // $resultValidator 배열의 요소 개수가 0보다 큰지 확인한다. 
        //즉, 유효성 검사 결과에 오류가 있는지를 판단함
        if(count($resultValidator) > 0) {
            // 클래스 속성인 '$this->arrErrorMsg'에 '$resultValidator' 배열을
            // 할당한다. 이 배열은 오류 메세지를 담고 있다.
            $this->arrErrorMsg= $resultValidator;
            return "login.php";
        }

        // 유저정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 유무 체크 (비어있는가?)
        if(empty($resultUserInfo)) {
            // 에러메세지
            // TODO : 나중에 추가
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }

        // 세션에 u_id 저장(pk)
        $_SESSION["u_id"] = $resultUserInfo["u_id"];

        // 로케이션 처리
        // TODO : 보드 리스트 게시판 타입 수정할 때 같이 수정
        return "Location: /board/list";

    }

     //회원 정보 수정
     protected function editGet() {
        return "edit.php"; // 회원정보 수정 페이지 파일명 변환
    }

    // 회원정보 수정 처리
    protected function editPost() {
        $requestData = [
            "u_name" => $_POST["u_name"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw_check" => $_POST["u_pw_check"]
        ];

        // 유효성 check
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg= $resultValidator;
            return "edit.php";
        }

        // 유저 정보 획득
        $userInfoData = [
            "u_id" => $_SESSION["u_id"]
        ];
        $modelUsers = new UsersModel(); // 모델 객체 생성
        $resultUserInfo = $modelUsers->getUserInfo($userInfoData);

        // update 데이터 셋팅
        $userInfoData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $resultUserInfo["u_email"]);
        $userInfoData["u_name"] = $requestData["u_name"];

        // 회원 정보 update 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->editUserInfo($userInfoData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        } else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원정보 수정에 실패했습니다."];
            return "edit.php";     
        }

        return "Location: /board/list";

    }

    // 로그아웃 처리
    // 내부, 외부, 상속x
    protected function logoutGet() {
        // 둘중 아무거나 쓰면 됨
        // uset은 해당 키 적으면 그것만 지웈
        //destroy는 다 날리는거 (파기)
        // session_unset();
        session_destroy();

        return "Location: /user/login";
    }

    // 회원 가입 페이지 이동
    protected function registGet() {
        return "regist.php";
    }

    // 회원 가입 처리
    protected function registPost() {
        $requestData = [
            "u_email"   =>   $_POST["u_email"]
            ,"u_name"     =>   $_POST["u_name"]
            ,"u_pw"   =>   $_POST["u_pw"]
        ];

        // 유효성 check
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg= $resultValidator;
            return "regist.php";
        }

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 이메일 중복 체크
        $selectData = [
            "u_email" => $requestData["u_email"]
        ];
        
        //유저정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo =  $modelUsers->getUserInfo($selectData);
        if(count($resultUserInfo) > 0) {
            $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            return "regist.php";
        }

        // 회원 정보 인서트 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->addUserInfo($requestData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        } else {
            $nodelUsers->rollBack();
            $this->arrErrorMsg = ["회원가입에  실패했습니다."];
            return "regist.php";     
        }

        return "Location: /user/login";
    }

    
    // 이메일 체크 처리
    protected function chkEmailPost() {
        // 유저 입력 데이터 획득
        $requestData = [
            "u_email"  => $_POST["u_email"]

        ];

        // response 데이터
        $responseArr = [
            // 정상
            "errorFlg"   =>  false 
            ,"errorMsg"  =>  ""            

        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg= $resultValidator;
        } else {
            // 이메일 중복 체크
            $modelUsers = new UsersModel();
            $resultUserInfo =  $modelUsers->getUserInfo($requestData);
            if(count($resultUserInfo) > 0) {
                $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            }

        }

        // response 데이터 셋팅
        if(count($this->arrErrorMsg) > 0) {
            $responseArr["errorFlg"] = true;
            $responseArr["errorMsg"] = $this->arrErrorMsg;
        }

        // response 처리
        header('Content-type: application/json');
        echo json_encode($responseArr);
        exit;
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw, $email) {
        return base64_encode($pw.$email);
    }

}