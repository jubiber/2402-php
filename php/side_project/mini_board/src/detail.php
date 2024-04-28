<?php
// 설정 정보
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
    // DB Connect
    $conn = my_db_conn(); // PDO 인스턴스 생성

    // 게시글 데이터 조회
    // 파라미터 획득
    // isset -> 변수가 설정되어 있고, null이 아닌지를 확인하는 함수
    // 이 함수는 변수가 설정되어 있고, 값이 null이 아닌 경우에만
    // true를 반환, 그렇지 않으면 false 반환 (안전 검증)
    $no = isset($_GET["no"]) ? $_GET["no"] : ""; // no 획득
    $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득

    // 파라미터 예외처리
    $arr_err_param = [];
    if($no === "") {
        $arr_err_param[] = "no";
    }
    if($page === "") {
        $arr_err_param[] = "page";
    }
    // $arr_err_param -> 오류 저장
    // count() -> 배열에 저장된 오류의 수 계산
    // if -> 배열에 저장된 오류가 한 개 이상인지 확인. 배열이 비어있지
    // 않고  오류가 있을 때 실행됨.
    if(count($arr_err_param) > 0) {
      // 오류 있으면 throw new Exception 으로 예외 발생시킴
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

} catch (\Throwable $e) {
    echo $e->getMessage();
    exit;
} finally {
    // PDO 파기
    if(!empty($conn)) {
        $conn = null;
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <title>상세 페이지</title>
</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <main>
      <div class="main-middle">
        <div class="line-item">
          <div class="line-title">게시글 번호</div>
          <div class="line-content"><?php echo $item["no"] ?></div>
        </div>
        <div class="line-item">
          <div class="line-title">제목</div>
          <div class="line-content"><?php echo $item["title"] ?></div>
        </div>
        <div class="line-item">
          <div class="line-title">내용</div>
          <div class="line-content"><?php echo $item["content"] ?></div>
        </div>
        <div class="line-item">
          <div class="line-title">작성일자</div>
          <div class="line-content"><?php echo $item["created_at"] ?></div>
        </div>
      </div>
      <div class="main-bottom">
          <a href="./update.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">수정</a>
          <a href="./list.php?page=<?php echo $page ?>" class="a-button small-button">취소</a>
          <a href="./delete.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">삭제</a>
      </div>
    </main>
</body>
</html>
