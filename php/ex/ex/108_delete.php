<?php
require_once("./lib_db.php");

try {
    $conn = db_conn(); //PDO 인스턴스 생성

    //쿼리작성
    $sql = " DELETE FROM employees WHERE emp_no = :emp_no ";
    $arr_prepare = [
        "emp_no" => 700000
    ];

    // 트랜잭션 시작
    //이 부분부터는 인지하고 넘어가야함.
    $conn->beginTransaction(); //트랜잭션 시작
    $stmt = $conn->prepare($sql); // DB 질의 준비
    //데이터를 연상배열로 가져와서 쓸수 있음.
    $stmt->execute($arr_prepare); // DB 질의 실행

    $conn->commit(); // commit
    echo "삭제 완료\n";
} catch (\Throwable $e) {
    // rollback 처리
    if(!empty($conn)) {
        $conn->rollBack();
    }
    echo "예외 발생 : ".$e->getMessage();
} finally {
    $conn = null;
}
