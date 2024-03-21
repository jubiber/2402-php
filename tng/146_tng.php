<?php

//유저가 보내온 값들을 받을 수 o
$question1 = isset($_GET["id"]) ? $_GET["id"] : "";
$question2 = isset($_GET["pw"]) ? $_GET["pw"] : "";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>로그인</h1>
<!-- method 어떤 방식으로 소통할건지 셋팅해주는 메시지? -->
    <form action="/146_tng.php" method="get">
        <label for="id">ID</label>
            <input type="text" name="id" id="id" minlength="4" maxlength="10">
             <br>
        <label for="pw">PW</label>   
            <input type="password" name="pw" id="pw">
            <br>
            <input type="submit">로그인</button>
    </form>

    <?php
        if($question1 !== "") {
            // 에코는 쌍따옴표
            echo "<h2>당신의 검색어는 <span style=\"color:red;\">$question1</span> 입니다.</h2>";
        }
        if($question2 !== "") {
            // 에코는 쌍따옴표
            echo "<h2>당신의 검색어는 <span style=\"color:red;\">$question2</span> 입니다.</h2>";
        }
    ?>
    <h2>당신의 ID는 pix1129 입니다.</h2>
    <h2>당신의 PW는 1234입니다.</h2>

</body>
</html>

<!-- 퍼블리싱 작업도 우리가 해야함 -->





