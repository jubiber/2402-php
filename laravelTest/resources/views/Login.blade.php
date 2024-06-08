<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <form action="{{ route('login)}}" method="POST">
    <div class="Login">
        <h2>로그인</h2>
        <div class="form-box">
            <label for="">아이디</label>
            <input type="text" placeholder="ID">
        </div>
        <div class="form-box">
            <label for="">비밀번호</label>
            <input type="text" placeholder="Password">
        </div>
        <input type="checkbox">로그인 정보 저장
        <button type="submit" class="btn">로그인</button>
        <a href="{{ route('join') }}">회원가입</a>
    </div>
    </form>
</body>
</html>