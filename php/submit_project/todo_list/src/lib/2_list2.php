<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(FILE_LIB_DB);
$list_cnt = 3; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화 (기본적으로 1로 셋팅되도록 해줌)

try {
    
} catch (\Throwable $th) {
    //throw $th;
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
        <div class="main-top"></div>
        <div class="main-middle">
            <div class="item list-head">
                <div class="board-no">게시글 번호</div>
                <div class="board-title">게시글 제목</div>
                <div class="board-createdat">작성 일자</div>
            </div>
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