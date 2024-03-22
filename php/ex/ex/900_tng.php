<?php
// 1~100까지 숫자가 있어요
// 3의배수를 제외하고 아래처럼 출력해 주세요

// 1입니다
// 2입니다
// 4입니다
// ...
// 100입니다

//range 함수 유용
$arr = range(1, 100);

// val은 값
//continue 뭐징?
//로직짜기 연습 (for while do while 이용해서 만들어보기)
foreach($arr as $val) {
    if(($val % 3) === 0) {
        continue;
    }
    echo $val."입니다.\n";
}
print_r($arr);

//foreach -> while.
//if문 중요
