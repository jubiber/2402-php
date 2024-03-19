<?php
// trim(문자열) : 공백 제거 함수
$str = " 홍길동 ";
echo trim($str);
echo "\n";

// strtoupper(문자열), strtolower(문자열) : 영어 대소문자 출력
echo strtoupper("asdawdf");
echo "\n";
echo strtolower("SDGWEV");
echo "\n";

// str_replace(대상문자열, 변경 문자열, ) : 특정 문자를 치환
$str = "key: 423jkltjlfweef";
// $str에서 "key: "를 찾아 제거
echo str_replace("key: ", "", $str);
echo "\n";
//mb_substr (문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 종료위치까지 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str, 1, 4);
echo "\n";
echo mb_substr($str, 2);
echo "\n";
//음수는 굳이 알 필요x
// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환됨.
//홓이 2번 있으면 젤 왼쪽께 반환됨.
//공백도 포함됨(숫자 헤아려야 함.)
$str = "나는 홍길동 입홍니다.";
echo mb_strpos($str, "홍");
echo "\n";

if(mb_strpos($str, "나") !== false) {
    echo "포함됨";
}
else {
    echo "없다";
}

// sprintf(포맷문자열, 대입 문자열1, 대입문자열2...)
// 예시1
$str_print = "당신의 점수는 %u점 입니다. <%s>";
$msg = sprintf($str_print, 100, "A+");
echo $msg;
echo "\n";

// 예시2
$base_msg = "%s이/가 틀렸습니다.<%s>";
$print_msg = sprintf($base_msg, "비밀번호", "에러코드00");
echo $print_msg;
echo "\n";

// isset(변수) : 변수의 설정 여부 확인 true/false 리턴
//NULL도 false, $ans5도 false이지만, 후자는 아예 존재하지 않는 값이다.
$ans1 = "";
$ans2 = NULL;
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4), isset($ans5));

//empty(변수) : 변수의 값이 비어있는지 확인, true/false 리턴


































































