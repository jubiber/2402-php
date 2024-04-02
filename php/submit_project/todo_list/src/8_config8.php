<?php

// config -> 설정이나 프로그램의 실행 일부 등을 저장해둔 파일.



//마리아디비 관련
 define("MARIADB_HOST", "127.0.0.1");   //DB HOST
define("MARIADB_USER", "root");         // DB 유저
define("MARIADB_PASSWORD", "php505");   // DB 비밀번호
define("MARIADB_NAME", "Mini_board");   // DB명
define("MARIADB_CHARSET","utf8mb4");     // DB 유니코드
define("MARIADB_DSN", "mysql:host=".MARIADB_HOST.";dbname=".MARIADB_NAME.";charset=".MARIADB_CHARSET); //부터 복붙ㅊ하기
//php 패스관련 복붙할 것.
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/"); // 웹서버 root 패스
define("FILE_HEADER", ROOT."header.php"); // 헤더 파일 패스
define("FILE_LIB_DB", ROOT."lib/lib_db.php"); // DB 파일 패스

// 유저 요청 정보
define("REQUEST_METHOD", strtoupper($_SERVER["REQUEST_METHOD"]));

?>