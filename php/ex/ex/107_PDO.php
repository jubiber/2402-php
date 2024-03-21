<?php
// 모던에서 가장 많이 사용하는 PDOclass 이용한 연동방법
// My sql

// notion 자주 쓸만한거 참고 보셍.
// 암기는 no, 자세한건 공식홈피 연결된 거 보고.

//connection 의 약자 conn
// $dsn 문자코드, 유니코드 정보 들어감
// $username 접속 명
// $passward 명
// $option pdo의 설정값들이 들어가는 파라미터
//DB접속 정보
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


//pdo 앞에 dns정보 들어감.
$conn = new PDO($dbDsn, $dbUser, $dbPw, $opt);
//중요 : 앞뒤공백 하나씩 먼저 쓰고 시작하셍.
//세미콜론 안붙임 -> PHP에서작성 할땐 LIMIT 세미콜론 작성 노.
//수정의 용의성일 위해서 분할해서 적어줌,,haha

// 쿼리 작성
$sql =
    " SELECT "
     ." * "
     ." FROM "
     ." employees "
     ." LIMIT "
     // ." 10 " del v001
     //변경 이력 남겨두고, 추가로 작성
     ." 5 " // add v001     
     ;
 //statment의 약자 stmt  (에 저장 하고 패치작업 진행)
$stmt = $conn->query($sql); // 쿼리 준비 + 실행
$result = $stmt->fetchAll(); // 질의 결과 패치
print_r($result);
$conn = null; // PDO 파기


//감정: db 연동하는 employees의 p를 o로 써서 너무 아쉬웠다.
//오타 하나로 프로그램을 재생시키지 못한다는게 싫다. 어디서
//오타 실수를 하는지 체크를 해놓아야겠다. 파이팅!
