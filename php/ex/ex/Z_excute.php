<?php

include_once("./Whale.php");
include_once("./Shark.php");
//똑같은 이름 문제없이  사용 가능하도록 -> 파일을 만들어준다
include_once("./namespace/Shark.php");

// use : namespace를 이용해서 특정 클래스를 지정
// 별칭은 (선택) as 안줘도 됨, 별칭 줬으면 무조건 별칭으로 사용
use php\ex\Shark as ExShark;
use php\ex\namespace\Shark as NamespaceShark; 

$obj = new ExShark("죠스");
$obj->swim();
$obj = new NamespaceShark();
$obj->test();