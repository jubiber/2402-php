<?php
//도메인/패스/키(name)/값(hong)/파라미터(name=hong)/&(파라미터 연결)
//비밀정보 no.
// localhost/파일명?name=hong&gender=M
// print_r($_GET);
// print_r($_GET["name"]);
//파일 옮겨주고 localhost 검색하면 연상배열로 들어감. +2도 가능.
//파일옮겨주는 방법?
//1. php 146 -> C: Apache24 > htdocs

// $question = "";
// if(isset($_GET["q"])) {
//     $question = $_GET["q"];
// }

// 삼항연산자
// 변수 = 조건식 ? 참일 경우 : 거짓일 경우
//중요: $_GET > 키,값 다 보인다.
//
$question = isset($_GET["q"]) ? $_GET["q"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>검색어를 입력하세요.</h1>
    <form action="/146_http_method_get.php" method="get">
        <input type="text" name="q">
            <button type="submit">검색</button>
    </form>
    <br>
    <br>
    <?php
        if($question !== "") {
            // 에코는 쌍따옴표
            echo "<h2>당신의 검색어는 <span style=\"color:red;\">$question</span> 입니다.</h2>";
        }
    ?>
</body>
</html>

