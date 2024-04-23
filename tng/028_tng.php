<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
// 특정 처리를 반복 구현하기위해 사용하는 문법인 for문을 사용했는데요,
// '달러 변수명'에 별 다섯개를 주고,
// for 문으로 (초기값; 조건식; 증감연산자) 순으로 작성하고, 중괄호 열고 
//에코로 반복 하고 싶은 처리를 작성하여 출력 해줍니다.
$star = "*****";
for($dan1 = 0; $dan1 < 5; $dan1++) {
    echo $star."\n";
} 
//강사님 관점
for($i = 0; $i < 5; $i++) {
    echo "*****\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
//해석: foreach함수를 사용하였음.
//먼저 반복해줘야 할 배열의 요소, 별 하나부터 다섯개까지 작성 해줍니다.
// foreach 함수가 $array의 각 요소를 $value에 대입하여 배열을 순회하여 반복 처리하는 데 사용하는 
//함수인데,
//소괄호 열고, as를 기준으로 좌측은 array 우측은 변수 value를 작성
//해줍니다. 
//그 다음 echo로 실행까지 해주면 아래 값이 출력됩니다.
$array = array("*","**","***","****","*****");
foreach($array as $value){
    echo("$value \n");
}

// 박T
for($i = 0; $i < 5; $i++) {
    for($z = 0; $z <= $i; $z++){
        echo "*";
    }
    echo "\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****
$array = array("    *","   **","  ***"," ****","*****");
foreach($array as $value){
    echo("$value \n");
}
$num = 6;
for($i = 0; $i < 5; $i++) {
    {for($j = 1; $i < $num - $j; $j++)
    echo $i=" ";
    for($z = 1; $z <= $j; $z++)
    echo $j = "*";
    }
    echo"/n";
}
// 박T
$num = 5;
for($i = 0; $i < $num; $i++) {
    $cnt_space = $num - $i;
    //for문 1개 + if문 이용
    for($z = 1; $z <= $num; $z++) {
        if($z <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n";

}
 for($i=0; $i<$num; $i++){
    for($z=$mum-1; $z>=0; $z--){
        if($z<=$i){
            echo "*";
        }
        else{
            echo " ";
        }
    }
    echo "\n";
 }
$num = 5;
 for($i = 1; $i < $num; $i++) {
    for($z = 0; $z < $num - $i; $z++) {
        echo " ";
    }
    for($y = 0; $y < $i; $y++) {
        echo "*";
    }
    echo "\n";
 }

 //for문 이용





