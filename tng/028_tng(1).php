<?php 

//강 풀
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