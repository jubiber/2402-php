<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(FILE_LIB_DB);
$list_cnt = 3; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화 (기본적으로 1로 셋팅되도록 해줌)

// 예외 처리
try {
    //DB Connect
    $conn = my_db_conn(); //connection 함수 호출
    //isset(변수) -> 참 true/.
    // 삼항연산자를 사용하여 페이지변수 설정
    $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;

    // 게시글 수 조회
    $result_board_cnt = db_select_boards_cnt($conn);
    // TODO : 나중에 추가

    //페이지 관련 설정 셋팅
    //TODO 나중에 추가
    $max_pag_num = ceil($result_board_cnt / $list_cnt); // 최대 페이지 수
    $offset = $list_cnt * ($page_num -1); //OFFSET
    //프젝은 디버깅이 안됨
    $before_page_num = ($page_num -1) < 1 ? 1 : ($page_num -1); // 이전 버튼 페이지 번호
    $next_page_num = ($page_num +1) > $max_pag_num ? $max_pag_num : ($page_num +1); //다음 버튼 페이지 번호

    //게시글 리스트 조회
    $arr_param  = [
        "list_cnt" => $list_cnt
        ,"offsest" => $offset // TODO : 나중에 값 변경 필요.
    ];
    $result = db_select_boards_paging($conn, $arr_param);
    


} catch (\Throwable $e) {
    echo $e->getMessae();
    exit;
}
finally {
    // PDO 파기
    if(!empty($conn)) {
        $conn = null;

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2_list2</title>
</head>
<body>
    <main>
        <div class="main-top">
            <a href="" class="a-button">글 작성</a>
        </div>
        <div class="main-middle">
            <div class="item list-head">
                <div class="board-no">게시글 번호</div>
                <div class="board-title">게시글 제목</div>
                <div class="board-createdat">작성 일자</div>
            </div>
            <?php
            
            ?>
            <div class="item">
                <div class="item-no"></div>
                <div class="item-title"></div>
                <div class="item-createdat"></div>
            </div>
        </div>
        <div class="main-bottom">
            <a href="" class="a-button small-button">이전</a>
            <a href="" class="a-button small-button"></a>
            <a href="" class="a-button small-button">다음</a>
        </div>
    </main>
</body>
</html>


<?php

$arr = ["a", "b", "c"];
echo $arr[0];



?>