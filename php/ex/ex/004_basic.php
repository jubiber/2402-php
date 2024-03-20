<?php
// 변수(Variable)
$str = "안녕 php";
echo $str;

// 한글도 설정 가능, but 사용 no.
$num1 = 1;
echo $숫자1;

    $user_name;
    $Num = 1;
    $num = 2;
    echo $Num, $num;

    // 네이밍 기법
    // 스네이크 기법
    $user_name;

    // 카멜 기법
    $userName;

    echo "\n";
    // 상수 : 절대 변하지 않는 값
    // 숫자(주로), 문자 가능
    define("USER_AGE", 20);
    define("USER_AGE", "가나다라");

    define("USER_AGE", 30); // 이미 선언된 상수이므로 워닝 일어나고 값이 바귀지x
    
    echo USER_AGE;

    // 점심메뉴
    // 탕수육 9000원
    // 햄버거 10000원
    // 빵 2000원


    $menu = "점심메뉴\n";
    $tang = "탕수육 9000원\n";
    $ham = "햄버거 10000원\n";
    $bread = "빵 2000원\n";
    echo $menu, $tang, $ham, $bread;

    define("MENU", "점심메뉴\n");
    echo MENU;

    // 스왑
    $swap1 = '곤드레밥';
    $swap2 = '자장면';
    $tmp = "";

    $tmp = $swap1;
    $swap1 = $swap2;
    $swap2 = $tmp;

    

    








