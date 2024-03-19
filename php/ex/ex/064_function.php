<?php
//num부분을 파라미터(현업에서는주로 파라미터라고 씀),(한국어: 인자, 매개변수(더 맞는말))라고 부름.
//return 연산결과; -> 연산 결과를 리턴
function my_sum($num1, $num2){
    return $num1 + $num2;
}
//숫자 -> 아규먼트(한국어: 인수)
//echo my_sum(32, 54);
//현업에서 함수가 많이 쓰임

// 파라미터 default 설정//

/**
 * 두 숫자를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 *  @param int $num2 더할 두번쨰 숫자, default 10
 * @return int 합계
*/
function my_sum2(int $num1, int $num2 = 10) {
    return $num1 + $num2;
}

echo my_sum2(5, 4);
//if 5만 적으면 $num1이 설정 안돼있으므로 5, 뒤는 10 -> 결과 15.
//but, 앞에 10을 설정하면 안됨 -> 에러발생. 
// (,5)로 하면가능.
//아규먼트는 뒤에다 작성 -> 암기할 것.
echo my_sum2(5);
echo "\n";

// -, * , /, % -> 각각의 함수를 만드세요.
//빼기
function my_min(int $num1, int $num2) {
    return $num1 - $num2;
}
echo my_min(8,5)
;
echo "\n";
// 곱하기
function my_multi(int $num1, int $num2) {
    return $num1 * $num2;
}
echo my_multi(8,5)
;
echo "\n";
//나누기
function my_div(int $num1, int $num2) {
    return $num1 / $num2;
}
echo my_div(8,2)
;
echo "\n";
//나머지
//나눌 값이 0이 아니게 주의해야 함.
//Division  by zero라고 오류표시 뜸.
function my_remainder(int $num1, int $num2) {
    return $num1 % $num2;
}
echo my_remainder(8,4)
;
echo "\n";

//서울 부산 다른 사람으로 생각해라.
// 아예 다른$str이라고 생각하면 됨.

$str = "처음 정의";
//얘는 호출되면 옴. $str 자체도 구분됨.
//est? 내에서 사용되는 함수임
// 함수 안에서만 적용됨
function test(string $str) {
    $str = "test()에서 변경";
}
//다른 함수를 삽입하였을 때 $str은 또다른 변수로 작용함.
function test2(string $str) {
    $str = "test2()에서 변경";
    return $str;
}

$str = test($str);
echo $str;

// 가변 길이 파라미터
//자동으로 배열함수(arr)가 됨.
//파라미터 5.6이상 사용할 수 있음. 이런게 있다 정도로 지나가면 됨
function my_sum_all(...$numbers) {
    print_r($numbers);
}

my_sum_all(3,5,2)
;
//이렇게 쓰는 경우도 있음
// PHP 5.5 이하

my_sum_all(3,5,2,6,4,6,7,6,4,2,5,6,4,6)
;
// 파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요.
function my_sum_all1(...$numbers) {
    foreach($arr as $val) {
        $sum = $num1 + $num2;
        echo $val. "\n";
    }
    print_r($numbers);
}
echo my_sum_all1(3,5,2,5,7,5,3,4,6,6);
echo $sum;

// 파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요.
function my_sum_all2(...$numbers) {
    $sum = 0; // 합계 저장용 변수, 합계를 저장하기 떄문에 숫자 0으로 초기화

    // 파라미터 루프해서 값을 획득 후 더하기
    foreach($numbers as $val) {
        $sum += $val;
        echo $val;
    }

    // 합계 리턴
    return $sum;
}
echo my_sum_all2(5,4,5,6);

// 참조 전달 (백앤드에서 주로 많이 다룸)
function test_v($num) {
    $num = 3;
}
// 참조전달 이라는게 있다 정도로만 알면 됨.
function test_r(&$num) {
    $num = 5;
}
//함수 밖 변수는 변하지x
//기본적으로 함수 안과 밖은 영향주지 못함.
// 쭉 공부하고 마지막에 한번 보셍
$num = 0;
test_v($num);
echo ($num);
echo "\n";

// 참조 변수
// 참조 변수가 없으면 b = 1이 나오고 a 앞에 참조주소를 넣어주면 b는 3이 나온다.
//이런게 있다 정도로 이해하고 넘어가자.
//공간 복잡도, 시간 복잡도 이런개념이 있다.
$a = 1;
$b = &$a;
$a = 3;

echo $b;









