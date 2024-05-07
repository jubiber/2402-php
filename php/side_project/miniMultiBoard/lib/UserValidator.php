<?php
namespace lib;

class UserValidator {
    // array 타입 $param_arr 파라미터 
    // chk어쩌고 호출할 때,  
    public static function chkValidator(array $param_arr) {
        $arrErrorMsg = []; // 에러 메세지 보관용

        // 패턴 생성
        $patternEmail       = "/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/";
        $patternPassword    = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName        = "/^[가-힣]{1,50}$/";

        // 이름 체크
        if(array_key_exists("u_name", $param_arr)) {
            if(preg_match($patternName, $param_arr["u_name"], $matches) === 0) {
                $arrErrorMsg[] = " 이름: 한글만 입력 가능";
            }
        }

        // 이메일 체크
        if(array_key_exists("u_email", $param_arr)) {
            if(preg_match($patternEmail, $param_arr["u_email"], $matches) === 0) {
                $arrErrorMsg[] = " 이메일: 형식 확인좀.";
            }
        }
        
        // 패스워드 체크
        if(array_key_exists("u_pw", $param_arr)) {
            if(preg_match($patternPassword, $param_arr["u_pw"], $matches) === 0) {
                $arrErrorMsg[] = " 비밀번호: 영어 대소문자 및 숫자, 특수문자(!,@) 8~20를 활용하여 작성해주세요.";
            }
        }
        if(array_key_exists("u_pw_check", $param_arr)) {
            if($param_arr["u_pw"] !== $param_arr["u_pw_check"]) {
                $arrErrorMsg[] = " 비번, 비번 확인 불일치";
            }
        }

        return $arrErrorMsg;
    }

}

// 정규표현식 이론

//정규 표현식 -> 문자열 검색하거나 변경 위해 사용되는 pattern
// 일반적으로는 정규식(레젝스??) 
//복잡 ->조금 쉽게 표현 ㄱㄴ(문자열)
//대부분 언어에서 정규식 문법 유사함.
//여러 기호 조합 -> 가독성 좋지x
//ex)admin@admin.com -> 옳? 검증하려면 
//  if ㅁ많이 쓰는거 번거로우니까 정규표현식으로 사용 (com dg 뭐 경우의수가 너무많으니까)
//g(문자열 내 모든패턴 검색) u(유니코드 전체 지원) 둘중 하나 많이 씀.

//결론: 이론 다 볼 필요x
//기호 -> a-z (a부터 z까지)
// ㄱ-ㅎ 가-힣 (~부터 ~까지)
//0-9
//샘플
// 휴대전화 부분, 아이디. 이메일 함 보셍 

//정규식 test site

//이메일 복사해서 위 espression에 붙이고
// text부분에 이메일 쓰면 파란색됨
//우측상단 보면 잘못쓰면 NO MATCH가 뜸.
// 허용되면 1 match라고 뜸.

