<?php
// for 문
// 특정 처리를 반복해서 구현할때 사용하는 문법 
for($i = 2; $i < 3; $i++) {
    echo $i."번째 루프\n";
}

// 총 10번 도는 루프문을 만들어 주세요.
//도중에 break를 써주면 이후 더이상 루프가 돌아가지 않음.
for($i = 0; $i < 10; $i++) {
    // 특정 조건일때 루프문 종료
    if($i === 3) {
        // break : 루프를 종료
        break;
    }
    echo $i;
}
;
// continue : continue 아래의 처리를 건너뛰고 다음루프로 진행
for($i = 0; $i < 10; $i++) {
    if($i === 3 || $i === 6 || $i === 9) {
        continue;
    }
    echo $i;
}

// 배열 루프
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for($i = 0; $i < count($arr); $i++) {
    echo $arr[$i];
}

// 다중루프 
for($i = 1; $i < 3; $i++) {
    echo "1번 LOOP : ".$i."번째\n";
    for($z = 1; $z <3; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}

// 구구단 2단 출력
// 예시)
// 2 X 1 = 2
// 2 X 2 = 4
// ...
// 2 X 9 = 18
//현업에서 string은 거의 생략함
//숫자도 주로 변수로 사용함 
$dan = 2;
for($multi_num = 1; $multi_num < 10; $multi_num++) {
    $msg_line = $dan." X ".(string)$multi_num." =".(string)($dan * $multi_num)."\n";
    echo $msg_line;
}

// 구구단
// 예시)
// ** 2단 **
// 2 x 1 = 2
// ...
// 9 x 9 = 81
for($dan = 2; $dan < 10; $dan++) {
    echo "** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num);
        echo $msg_line."\n";
    }
}









