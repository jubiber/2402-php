<?php
// 로또 번호 생성기
// 1~ 45 까지의 랜덤한 숫자를 6개 뽑습니다.
// 단, 중복되는 숫자는 없어야 합니다.

// 1. 1~45 랜덤함 숫자 1개 구하기
// 2. 1번의 숫자를 6번 반복해서 6개 구하기
// 3. 중복 된 숫자 해결하기

// rand(최소 숫자, 최대 숫자)
// (내장함수 마지막) random_int(시작 값,끝 값)
//을 비교 -> rand는 일정값이 고정되어서 나타나고
//random_int는 모두 랜덤 숫자이므로 활용에 있어 더 정확하다.(표준편차가 가장 적다)
$arr =array();

for($i=0; $i<6; $i++)
{
    $arr[$i] = random_int(1,45);
    for($j=0; $j<$i; $j++)
    {
        if($arr[$i] == $arr[$j])
    
    {
        // break 역할 반복문을 멈추고 빠져나오고자 할 때 사용
        $i--;
        break;
    }
}
}
// print_r() : 배열을 모두 화면에 출력하는 함수
//사용법은 print_r(array) 
print_r($arr);

// 박T
// 방법 1(원초적 방법)
$arr_pick = []; // 뽑은 값 저장용
while(true) {
    $int_rand = random_int(1, 45); // 랜덤 숫자 획득

    // 중복 체크
    if(!isset($arr_pick[$int_rand])) {
        $arr_pick[$int_rand] = $int_rand;
    }
    //루프 종료 체크
    if(count($arr_pick) === 6) {
        break;
    }
}
print_r($arr_pick);

// 방법 2 표준편차가 가장 적음
$arr_base = range(1, 45) ; // 기본 배열
$arr_pick = []; //뽑은 값 저장용
for($i = 0; $i < 6; $i++) {
    $int_rand = random_int(0, count($arr_base) - 1); // 랜덤 숫자 획득(배열의 키)
    $arr_pick[] = $arr_base[$int_rand]; // 랜덤한 값 저장
    unset($arr_base[$int_rand]); // 사용한 요소 삭제
    $arr_base = array_values($arr_base); // 배열 인덱스 정렬
}
print_r($arr_pick);

// 방법3
$arr_base = range(1, 45); // 기본 배열
shuffle($arr_base); // 배열 섞기
$result = array_slice($arr_base, 0, 6); // 배열 키 0~6까지 가져오기
print_r($result);





















