<?php
// trim(문자열) : 공백 제거 함수
$str = "  홍길동 ";
echo trim($str);

// strtoupper(문자열), strtolower(문자열) : 영어 대소문자 출력
echo strtoupper("asdawdf");
echo strtolower("SDGWEV");
echo "\n";

// str_replace(대상문자열, 변경 문자열, ) : 특정 문자를 치환
echo str_replace("a", "", str_replace("f","","abcadeafg"));

// mb_substr(문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 종료위치까지 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str, 1, 4)."\n";
echo mb_substr($str, 2)."\n";
//음수는 굳이 알 필요x
// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환됨.
// 홍이 2번 있으면 젤 왼쪽께 반환됨.
$str = "나는 홍길동 입홍니다.";
echo mb_strpos($str, "홍")."\n";

if(mb_strpos($str, "나") !== false) {
    echo "포함됨";
}
else {
    echo "없다";
}
// sprintf(포맷문자열, 대입 문자열1, 대입문자열2...)
$base_msg = "%s이/가 틀렸습니다.(%s)";
$print_msg = sprintf($base_msg, "비밀번호", "에러코드00");
echo $print_msg."\n";

// isset(변수) : 변수의 설정 여부 확인 true/false 리턴
$ans1 = "";
$ans2 = NULL;
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4), isset($ans5));

// empty(변수) : 변수의 값이 비어있는지 확인, true/false 리턴
var_dump("--",empty($ans1), empty($ans2), empty($ans3), empty($ans4), empty($ans5));

// gettype(변수) : 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 = 5;
$arr1 = [];
$double1 = 1.4;
$boo = true;
$null1 = NULL;
$obj = new DateTime();
var_dump(gettype($str1), gettype($int1)
    , gettype($arr1), gettype($double1)
    , gettype($boo), gettype($null1), gettype($obj));

// settype(변수): 변수의 데이터 형을 반환, 원본 변수 자체가 변경되므로 주의
//원래 원본데이터는 수정되면 안된다 결과가 다르게 나오기 때문
// 데이터 변환에 성공하면 결과가 true, 그렇지 않으면 false 
$i = 3;
$i2 = settype($i, "string");
var_dump($i,$i2);

// time() : 유닉스 타임스탬프
//초단위가 표시됨 대부분의 컴이 유닉- 타- 사용
//실시간으로 변하며 19900101 이후로 몇초가 지났는지 표시
echo time();

//추가설명 Y2K버그 900131 000131(2000년됐음 how?) 변경 위해
//천문학적 비용 제출 요망 500만달러 -> 수정함.
//Y2K 38 (2038되면 고갈됨.)
//64비트? 라서 ㄱㅊ2000억년정도
//의료나 임베디드 32비트라서 Y2K해결 안될수도O
//maria db는  32비트라서 대응준비중

//date(포맷형식, 타임스탬프값) : 타임스탬프 값을 날짜 포맷형식으로 변환해서 반환
echo date("Y-m-d H:i:s", time()-86400); // 20000101 13:50:08

//굳이 안적어도 되는 부분임
//월 계산이 잘 안되므로 날짜계산에서 주의 요망.
//php는 03-01로 표시되는데 쳐보니 03-02로 나오네 오류뜸.
//한달 정제 잘 안될 수 있다 -> 이부분 주의 필요.
//$date1 = new DateTime("2024-03-31");
//$date1->modify("-1 month");
//echo $date->format('Y-m-d');

// ceil(숫자), round(숫자), floor(숫자)
//고객에게 좋 -> 올림, 안좋 -> 내림
var_dump(ceil(1.4), round(2.5), floor(1.9));

// random_int(시작값, 마지막값) : 시작값~마지막값 범위의 랜덤한 숫자를 반환
echo random_int(1, 10);



















