<?php

// config -> 설정이나 프로그램의 실행 일부 등을 저장해둔 파일임.



//MariaDB 관련
 define("MARIADB_HOST", "localhost");   //DB HOST
define("MARIADB_USER", "root");         // DB 유저
define("MARIADB_PASSWORD", "php505");   // DB 비밀번호
define("MARIADB_NAME", "mini_board");   // DB명
define("MARIADB_CHARSET","utf8mb4");     // DB 유니코드
define("MARIADB_DSN", "mysql:host=".MARIADB_HOST.";dbname=".MARIADB_NAME.";charset=".MARIADB_CHARSET);
// PHP Path 관련
// ROOT 상수를 정의함. 현재 서버의 문서 루트 경로를 가리킴.
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
//FILE_HEADER 상수를 정의함. 이는 ROOT 경로에 "header.php" 파일을 가리킴.
define("FILE_HEADER", ROOT."header.php");
// FILE_LIB_DB 상수를 정의함. 이는 ROOT 경로의 "lib" 폴더 안에 있는 "lib_db.php" 파일을 가르킴.
define("FILE_LIB_DB", ROOT."lib/lib_db.php");

// 유저 요청 정보
// REQUEST_METHOD 상수를 정의함. 이는 현재 서버에서 사용되는 요청 메서드를 대문자로 변환하여 저장함.
define("REQUEST_METHOD", strtoupper($_SERVER["REQUEST_METHOD"])); // 요청 메소드

?>