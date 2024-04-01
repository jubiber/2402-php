<?php

// 1. 인덱스 배열
$arr = ["a", "b", "c"];
echo $arr[0];
echo $arr[1];
echo $arr[2];

$arr[]="d";

echo $arr[3];

$arr[1] = "변경";

echo $arr[1];

// 2. 연관 배열(키 -> 값 접근)
$arr = [
    "id" => "biber"
    ,"pw" => "php505"
    ,"birth_date" => 20001230
];
echo $arr["id"];
echo $arr["pw"];
echo $arr["birth_date"];

$arr["name"] = "홍길동";

echo $arr["name"];

$arr["id"] = "그로밋";

echo $arr["id"];

// 3. 다차원 배열
$arr = [
    [
        "id" => "biber"
        ,"pw" => "biber505"
        ,"birth_date" => 20001230
    ]
    ,[
        "id" => "dog"
        ,"pw" => "dog505"
        ,"birth_date" => 19901010
    ]
    ,[
        "id" => "cat"
        ,"pw" => "cat505"
        ,"birth_date" => 18000930
    ]
    , "sal_info" => [ 1,2,3]
   ];

echo $arr[0]["id"];
echo $arr[1]["pw"];
echo $arr[2]["birth_date"];
echo $arr["sal_info"][1];

//배열에서 자주 사용하는 함수
// 1.count(배열변수) -> 4개
$arr = [1,2,3,4];
echo count($arr); 
// 2.unset(배열변수[키]) -> 삭제
// $arr = [1,2,3,4];
// unset($arr[1]);
// var_dump($arr)

//배열의 정렬 (체크)


// if문
// 참 -> 해당처리 진행 ,아니면 다음 조건을 체크
// AND 와 OR로 조건 여러개 설정 가능
// if(조건1) {
    
// }
// else if(조건2) {
    
// }
// else if(조건3) {
    
// }
// else {
    
// }

// 문제 : 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력
$num = 5;

if( $num === 1 ) {
    echo "1등";
}
else if( $num === 2 ) {
    echo "2등";
}
else if( $num === 3) {
    echo "3등";
}
else if( $num === 4) {
    echo "4등";
}
else {
    if( $num === 5) {
        echo "특별상";
    }
    else {
        echo "순위 외";
    }

};

// 문제2. 1번 정답2, 2번 정답 5
// 1, 2번 모두 정답 -> 100점,
//둘 중 하나 정답 -> 50점
// 모두 오답 0점 출력

$answer1 = 2;
$answer2 = 3;

if( $answer1 === 2 && $answer2 === 5 ){
    echo "100점";

}
else if( $answer1 ===2 || $answer2 === 5 ){
    echo "50점";
}
else {
 echo "0점";
};

//switch문
// 아래의 소스코드를 실행하면 "기타"가 출력
$food = "떡볶이";

switch( $food ) {
    case "김밥":
     echo "한식";
     break;
    case "탕수육":
     echo "중식";
     break;
    default:
     echo "기타";
     break;

}

//for문? -반복처리
// for(초기값; 조건식; 증감연산자) {
//  반복 하고픈 처리
// }
for($i = 0; $i < 3; $i++) {
    echo $i."번째 루프\n";
}
//처리 중 break문 만나면 루프 종료
for($i = 0; $i < 5; $i++) {
    if($i === 3) {
       break;
    }
    echo $i."번째 루프\n";
}
//continue문 -> 그 아래 처리 건너뛰고 다음 루프 진행
for($i = 0; $i < 5; $i++) {
    if($i === 3) {
        continue;
    }
    echo $i."번째 루프\n";
}
//다중루프 -> 루프 아래 루프o
for($i = 0; $i < 2; $i++) {
    echo "바깥 : ".$i."번째 루프\n";
    for($z = 0; $z < 3; $z++) {
        echo "안 : ".$z."번째 루프\n";
    }
}

//foreach문 -> 루프
$arr = [1,2,3];
//값
foreach($arr as $val) {
    echo $val."\n";
}
//키와 값
$arr = [
    "name" => "miu"
    ,"age" => 10
    ,"gender" => "F"
];
foreach($arr as $key => $val) {
    echo $key." is ".$val."\n";
}
//while문?
$cnt = 0;

while($cnt < 3){
    echo $cnt."번째 루프\n";
    $cnt++;
}

while(true) {
    echo "여러가지 처리를 합니다.";

    if(true) {
        break;
    }

}
//do_while문? -> 우선 한번 처리 실행, 이후 조건 체크하고 그 결과에 따라 루프를 진행하는 문법
//조건문이 참이면 루프를 진행하고, 조건문이 거짓이면 루프를 종료한다.
do{
    echo "출력합니다.\n";
}
//여기에 true치면 무한루프 돈다.
while(false);

//PHP 내장함수
//1.trim(문자열) -> 공백 제거
$str = " sdsd ";
echo trim($str);

//2.strtoupper(문자열), strtolower(문자열) -> 대소문자 반환
$str = "abcd";
echo strtoupper($str);
$str = "ABCD";
echo strtolower($str);
//3.mb_strlen(문자열) -> 문자열 길이 반환 (+ 멀티바이트 문자열에 대응)
$str = "abc";
echo mb_strlen($str);
$str = "가나다";
echo mb_strlen($str);
//4.str_replace(문자열) -> 특정키 제거
$str =  "Key: 423jkltjlfweef";
// $str에서 "key: "를 찾아 제거
echo str_replace("key: ","", $str);
//5.mb_substr(문자열, 시작위치, 출력할 개수) -> 문자열을 잘라 반환
echo mb_substr("abcdeg", 3);
echo mb_substr("abcdeg", -2);
echo mb_substr("abcdeg", 1, 4);
echo mb_substr("abcdeg", -3, 2);
//6.mb_strpos(대상 문자열, 검색할 문자열) -> 문자열에서 특정 문자의 위치를 반환
//포인트: 공백포함
echo mb_strpos("나는 그로밋 이다.", "그로밋");
//7.sprintf(포맷문자열, 대입 문자열1, 대입문자열2 ...)
//1) %s -> 문자열 대입
//2) %d -> 정수 대입 (양수,0,음수 모두 표현)
//3) $u -> 정수 대입 (양수만 표현)
//4) %f -> 부동 소수점 수를 대입 (f앞에 .n을 입력하여 자리수 표현 가능
//예)%.2f로 작성할 경우 소숫점 2자리 까지 표현)
$str_print = "당신의 점수는 %u점 입니다. <%s>";
$msg = sprintf($str_print, 70, " B");
echo $msg;

////////// isset 부터.

//1. isset(변수) -> 설정o true, no false
$str1 = "";
$str2 = null;
var_dump(isset($str1));
var_dump(isset($str2));
var_dump(isset($str3));
//2. empty(변수) -> 비어o true, no false
$str1 = "abc";
$str2 = "";
$str3 = 0;
$str4 = [];
$str5 = null;
//비어있지 않으니까 false (비어있어야 true이므로)
var_dump(empty($str1));
var_dump(empty($str2));
var_dump(empty($str3));
var_dump(empty($str4));
var_dump(empty($str5));
var_dump(empty($str6));

//3. gettype(변수) -> 변수의 데이터형 반환
$str1 = "abc"; // string
$str2 = ""; // string
$str3 = 0; // integer
$str4 = []; // array
$str5 = 1.2; // double
$str6 = true; // boolean
$str7 = null; // NULL
$str8 = new DateTime(); // object
echo gettype($str1);
echo gettype($str2);
echo gettype($str3);
echo gettype($str4);
echo gettype($str5);
echo gettype($str6);
echo gettype($str7);
echo gettype($str8);
//4. settype(변수, 데이터타입 문자열)
$i = 1;
// string(1) "3"과 bool(true) 출력
var_dump($i, settype($i, "string"));
?>