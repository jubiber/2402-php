<?php
/**
 * DB정보 작성 및 PDO 객체 반환
 * 
 * @return PDO PDO객체
 */

//lib함수 이용해서 연결할거임
//다른파일 소스코드 쓰려면 include require 
// 더 상위 ex를 키려면 .하나를 더 붙이면 됨.
require_once("../lib_db.php");

$limit = 5;
try {
$conn = db_conn(); //PDO객체 리턴 함수 호출


//쿼리작성
//placeholder 셋팅이 없는 경우
//+주석처리 : ctrl + /
// $sql = 
//     " SELECT * FROM employees LIMIT 5 ";
//  //statement의 약자 stmt  (에 저장 하고 패치작업 진행)
// $stmt = $conn->query($sql); // 쿼리 준비 + 실행
// $result = $stmt->fetchAll(); // 질의 결과 패치

// placeholder 셋팅이 필요한 경우
// : limit 하여 변수명 지정.
//offset 그리고 prepare에 해주면 연동됨.
//offset에 오타를 주면 대응되는 값이 수가안맞으므로 에러가 뜸.
    $sql =  " SELECT * FROM employees LIMIT :limit OFFSET :offset ";
    
    $arr_prepare = [
        "limit" => $limit
        ,"offset" => 10
    ];
    $stmt = $conn->prepare($sql); // 쿼리 준비
    $stmt->execute($arr_prepare); //쿼리 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치

    print_r($result);
} catch (Throwable $e) {
    echo "예외 발생 : ".$e->getMessage()."\n";
} finally {
    $conn =null; // PDO 파기
}
echo "--------------------------------------\n";



// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// prepared statement 이용해서 작성
$arr_emp_no = [10003,10004];
try {
    //POD 인스턴스 생성
    $conn = db_conn();

    // SQL 작성
    //feedback: 쿼리문 활용 연습할 것.
$sql = 
" SELECT "
    ." sal.salary " 
    ." ,emp.emp_no "
    ." ,emp.birth_date " 
    ." FROM employees emp "
    ."  JOIN salaries sal "
    ."        ON emp.emp_no = sal.emp_no "
    ."        AND sal.to_date >= DATE(NOW())  "
    ." WHERE "
    ."  emp.emp_no IN(:emp_no1, :emp_no2)  "
   
    ;
    //feedback: 이부분 작성 못하였음 ㅠㅠ 보완 필요.
    $arr_prepare =[
         "emp_no1" => $arr_emp_no[0]
         ,"emp_no2" => $arr_emp_no[1]
        //이어서 문자열로 만들어줌.
     
    ];
    $stmt = $conn->prepare($sql); // DB 질의 준비
    $stmt->execute($arr_prepare); // DB 질의 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치
    print_r($result);
}
catch (Throwable $h){
    echo "예외 발생 : ".$h->getMessage();
}
finally {
    $conn = null;
}

$arr = [10003, 10004, 10005];
//사용하면 배열이었던 애가 문자열로 나오게 됨.
var_dump(implode(",",$arr));
echo "--------------------------------------\n";




//conn을 finally 안에. scope와 관련된 문제임
// 예외 발생해도 멈추지x -> 처리 이어나갈 수 있도록 만들어줌


//try 밖 상단에 limit = 5;를 작성하지 않았음
//ex파일 하나로 정리할 것.... 꼭



