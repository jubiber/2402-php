<?php
// 설정 정보
//외부 파일을 포함하는 함수(4가지)
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리 불러옴

// GET  -> 지금 get메소드 안넣어도 동작 함. 그래서 지워줬음.
 // POST 처리
if (REQUEST_METHOD === "POST") {
    try {
     // 파라미터 획득
     
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 획득
    $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득
    
    // 파라미터 에러 체크
    //parameter(매개변수)
    $arr_err_param = [];
    
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
    } 
    finally {
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
              <div class="line-title"><?php echo $item["title"] ?>제목</div>
            </label>
            <div class="line-content">
              <input type="text" name="title" id="title">
            </div>
          </div>
          <div class="line-item">
            <label class="line-title" for="content">
              <div class="line-title"><?php echo $item["content"] ?>내용</div>
            </label>
            <div class="line-content">
             <textarea name="content" id="content" rows="10"></textarea>
          </div>
        </div>
        <div class="main-bottom">
          <button type="submit" class="a-button small-button">작성</button>
          <a href="./index.html" class="a-button small-button">취소</a>
        </div>
      </form>
    </main>
</body>
</html>