
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리<!DOCTYPE html>

try {
    // DB Connect
    $conn = my_db_conn(); //PDO 인스턴스 생성

    if(REQUEST_METHOD === "GET") {
          // 파라미터 획득
          $no = isset($_GET["no"]) ? $_GET["no"] : ""; //no 획득
          $page = isset($_GET["page"]) ? $_GET["page"] : ""; //page 획득
          
          // 파라미터 예외처리
          $arr_err_param = [];
          if($no === "") {
                  $arr_err_param[] = "no";
          }
          if($page === "") {
              $arr_err_param[] = "page";
          }
          if(count($arr_err_param) > 0) {
              //explode vs implode
                  throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
          }
  
          // 게시글 정보 획득
          $arr_param = [
              "no" => $no
          ];
          $result = db_select_boards_no($conn, $arr_param);
          if(count($result) !== 1) {
              throw new Exception("Select Boards no count");
  
          }
  
          // 아이템 셋팅
          $item = $result[0];
  
  
      }
      else if (REQUEST_METHOD === "POST") {
          // 파라미터 획득
          $no = isset($_POST["no"]) ? $_POST["no"] : "";
  
          // 파라미터 예외처리
          $arr_err_param = [];
          if($no === "") {
                  $arr_err_param[] = "no";
          }
          if(count($arr_err_param) > 0) {
              //explode vs implode
                  throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
          }

    } else if(REQUEST_METHOD === "POST") {

    }
    
} catch (\Throwable $e) {
    echo $e->getMessage();
    exit;
} finally {
    //PDO 파기
    if(!empty($conn)) {
        $conn =null;
    }

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정 페이지</title>
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <main>
      <form action="./detail.php" method="post">
        <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
        <input type="hidden" name="page" value="<?php echo $page; ?>">
        <div class="main-middle">
          <div class="line-item">
            <div class="line-title">게시글 번호</div>
            <div class="line-content"><?php echo $item["no"]; ?></div>
          </div>
          <div class="line-item">
            <label class="line-title" for="content">
              <div class="line-title-textarea">제목</div>
            </label>
            <div class="line-content">
              <input type="text" name="title" id="title" value="<?php echo $item["title"] ?>">
            </div>
          </div>
          <div class="line-item">
            <label class="line-title" for="content">
              <div class="line-title-textarea">내용</div>
            </label>
            <div class="line-content">
             <textarea name="content" id="content" rows="10"><?php echo $item["content"]?></textarea>
          </div>
        </div>
        <div class="main-bottom">
          <button type="submit" class="a-button small-button">완료</button>
           <a href="./detail.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">취소</a>
        </div>
      </form>
    </main>
</body>
</html>