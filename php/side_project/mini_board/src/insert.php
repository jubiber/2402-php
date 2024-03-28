<?php
// 설정 정보
//외부 파일을 포함하는 함수(4가지)
// include 경고 -> 게속 진행
// require 중지
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

// GET  -> 지금 get메소드 안넣어도 동작 함. 그래서 지워줬음.
 // POST 처리
if (REQUEST_METHOD === "POST") {
    try {
     // 파라미터 획득
     //isset(변수) 변수의 설정 여부를 확인해서 설정 되어 있으면true, 그렇지 않으면 false 반환
     //title 작성란에 isset함수를 사용하여 title에 작성을 하면 trim(좌우공백제거)이면서, true가 나오고
     //그렇지 않으면 false가 나온다. (content도 동일)
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 획득
    $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득
    
    // 파라미터 에러 체크
    //$arr_err_param 변수를 분석해 보자면,
    //arrange(배열) error(에러) parameter(매개변수)이다.
    $arr_err_param = [];
    // if문이란? 조건에 따라 서로 다른 처리를 하는 문법으로
    // 조건이 참 -> 진행, 거짓 -> 다음조건 체크
    // AND와 OR 이용해 여러조건 설정 가능
    //if(조건1) {
        //조건1이 참 -> 실행할 처리
    // }
    // 조건1이 거짓일 경우 다음 체크로 진행
    // else if(조건2) {
        // 조건2가 참이면 실행할 처리
    // }
    // 앞선 조건1,2 모두 거짓 -> else 실행
    // else {

    // }
    
    // 인덱스 배열
    if($title === "") {
        $arr_err_param[] = "title";
    }
    if($content === "") {
        $arr_err_param[] = "content";
    }
    if(count($arr_err_param) > 0) {
        // 예외 처리
        throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
    }

    //Db Connect
    $conn = my_db_conn(); //PDO 인스턴스

    // Trasaction 시작
    $conn->beginTransaction();

    // 게시글 작성 처리
    $arr_param = [
        "title" => $title
        ,"content" => $content
    ];
    $result = db_insert_boards($conn, $arr_param);  

    // 글 작성 예외처리
    if($result !== 1) {
        throw new Exception("Insert Boards count");
    }

    // 커밋
    $conn->commit();

    // 리스트 페이지로 이동
    header("Location: list.php");
    exit;
   
  }
     catch (\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    } finally {
        if(!empty($conn)) {
            $conn = null;
        }
    }
   
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>작성 페이지</title>
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <main>
      <form action="./insert.php" method="post">
        <div class="main-middle">
          <div class="line-item">
            <label class="line-title" for="content ">
              <div class="line-title">제목</div>
            </label>
            <div class="line-content">
              <input type="text" name="title" id="title">
            </div>
          </div>
          <div class="line-item">
            <label class="line-title" for="content">
              <div class="line-title">내용</div>
            </label>
            <div class="line-content">
             <textarea name="content" id="content" rows="10"></textarea>
          </div>
        </div>
        <div class="main-bottom">
          <button type="submit" class="a-button small-button">작성</button>
           <button type="submit"><a href="./index.html" class="a-button small-button">취소</a></button>
        </div>
      </form>
    </main>
</body>
</html>