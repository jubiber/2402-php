<?php

$base_msg = "%s이/가 틀렸습니다.";
$print_msg = sprintf($base_msg, "비밀번호");
echo $print_msg."\n";


// 064 파일의 92번라인
function my_sum_all(...$numbers) {
    //$numbers = func_get_args(); 
    print_r($numbers);
}
