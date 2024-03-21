<?php
//오타에서 주의할 것. 파이팅!

function db_conn() {
$dbHost     = "localhost"; // DB Host
$dbUser     = "root"; // DB 계정명
$dbPw       = "php505"; // DB 패스워드
$dbName     = "employees"; // DB 명
$dbCharset  = "utf8mb4"; // DB charset
$dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset; //dns

//PDO 옵션
$opt = [
    // Prepared Statement로 쿼리를 준비할 때, PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
    //static :: 숫자 20이 저장돼있는 프로퍼티
    PDO::ATTR_EMULATE_PREPARES      => false // DB에서 에뮬레이션 하게 설정
    // PDO에서 예외를 처리하는 방식을 지정]
    //에러모드 익셉션으로 해준다.
     ,PDO::ATTR_ERRMODE             =>PDO::ERRMODE_EXCEPTION
     // DB의 결과를 저장하는 방식
     //다루기 편한 연상배열 갖고옴. 객체(OBJ) 는 좀 어렵
     ,PDO::ATTR_DEFAULT_FETCH_MODE  =>PDO::FETCH_ASSOC // 연상배열로 패치
];

    return new PDO($dbDsn, $dbUser, $dbPw, $opt);
}