<?php
//'namespace'파일이름 겹치지 않도록 경로를 지정 해줘야함.
//찍는파일인 Z_escute.php에 'use'로 클래스를 지정해줌.
//파일명 클래스명 중복되지 않게 지정하는게 좋음
namespace php\ex\namespace;

class Shark {
    public function test() {
        echo "namespace의 Shark 클래스\n";
    }
}