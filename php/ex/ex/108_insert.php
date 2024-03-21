<?php
require_once("./lib_db.php");
try {
    $conn = db_conn(); // PDO 인스턴스 생성

    // 쿼리작성
$sql =   "INSERT INTO employees (
        emp_no
        ,birth_date
        ,first_name
        ,last_name
        ,gender
        ,hire_date
    )
    VALUES (
        :emp_no
        ,:birth_date
        ,:first_name
        ,:last_name
        ,:gender
        ,DATE(NOW())
    ) "
    ;
    $arr_prepare = [
        "emp_no" => 700000
        ,"birth_date" => 20000124
        ,"first_name" => "hong"
        ,"last_name" => "hong"
        ,"gender" => "M"
    ];
    // transaction(거래,매매) 시작
    // 복수처리 -> 모든게 성공하면 commit(저지르다)작업 하고 하나라도 실패하면
    //commit되기 전으로 돌려줌. rollback(역행,후퇴)을 써줌.
    // ->가져오겠다는  표시
    //statement : 성명
    $conn->beginTransaction();
    $stmt = $conn->prepare($sql); // DB 질의 준비(물어본다.)
    $result = $stmt->execute($arr_prepare); // DB 질의 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득
    //예외 처리 :1이 아니면 다 에러
    if ($result_cnt !== 1) {
    // 개발자의 필요에 따라 강제로 예외 발생 시키는 방법
        throw new Exception("영향 받은 레코드 수 이상");
    }
    // 정상 완료
    $conn->commit();
    echo "커밋 완료\n";
} catch (\Throwable $e) {
    if(!empty($conn)) {
        $conn->rollBack();   
    }
    echo "예외 발생 : ".$e->getMessage();
} finally {
    $conn = null;
} 





