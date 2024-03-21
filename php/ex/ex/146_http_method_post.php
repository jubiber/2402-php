<?php
print_r($_POST);
print_r($_POST["chk"]);
//warning 넘어감, fatal error > 아예 멈춰버림. 뒤에 수식x
//유저가 보내온 값들을 받을 수 o

// get -> url에 담겨서 넘어옴 
// post -> header에 담겨서 옴
// data 를 숨기고 전송해줌.

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
    <form action="/146_http_method_post.php" method="post">
        <input type="hidden" name="hidden" value="숨겨졌다.">
        <input type="hidden" name="method" value="DELETE.">

        <label for="id">ID</label>
        <input type="text" name="id" id="id" minlength="4" maxlength="10">
        <br>
        <label for="pw">PW</label>   
        <input type="password" name="pw" id="pw">
        <br>
        <label for="subway">subway</label>
        <!-- 체크박스는 같은 네임으로 지정 -->
        <input type="checkbox" name="chk[]" id="subway" value="subway">
        <label for="pan">빵</label>
        <input type="checkbox" name="chk[]" id="pan" value="빵">
        <label for="do">도삭면</label>
        <input type="checkbox" name="chk[]" id="do" value="도삭면">
        <br><br>
        <label for="m">남자</label>
        <input type="radio" name="radio" id="m" value="남자">
        <label for="f">여자</label>
        <input type="radio" name="radio" id="f" value="여자">
    
        <br>
        <button type="submit">로그인</button>
    </form>

    <h2>당신의 ID는 pix1129 입니다.</h2>
    <h2>당신의 PW는 1234입니다.</h2>
    
</body>
</html>