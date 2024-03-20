<?php
// while 문
$cnt = 0;
while($cnt < 4) {
    echo "count : $cnt \n";
    $cnt++;
}
$cnt = 0;
while(true) {
    echo "$cnt \n";
    if($cnt === 3) {
        break;
    }
    $cnt++;
}


// while를 이용해서 2단을 출력해 주세요.
// 2 X 1 = 2
// 2 X 2 = 2
// ...
// 2 X 9 = 18

$r = 2;
$k = 1;
// while($k < 10)  {
//     //if($k === 10) {
//         //break;
//     //}
//     $msg_line = $r." X ".(string)$k." = ".(string)($r * $k)."\n";
//     echo $msg_line;
//     $k++;
// }
// 2단부터 9단까지 출력ㅎㅎ
$r = 2;
$k = 1;
while($r <10){ 
    $k = 10;
    echo $r."단\n";
    while($k < 10) {
        $msg_line = $r." X ".$k." = ".($r * $k)."\n"; 
        echo $msg_line;
    }  
    $r++;
}
//강 풀
$num = 1;
while($num < 10) {
    echo "2 X ".$num." = "(.2 * $num)."\n";
    $num++;
}

$dan = 2;
$multi_num = 1;
while($dan < 10) {
    $multi_num = 1;
    echo $dan. "단\n";
    while($multi_num < 10) {
        echo $dan." X " .$multi_num." = ".($dan * $multi_num)."\n";
        $multi_num++;
    }
    $dan++;
}






