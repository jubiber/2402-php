<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <form action="{{ route('login')}}" method="POST">
    @csrf
    <div class="Login">
        <h2>로그인</h2>
        <div class="form-box">
            <label for="email">아이디</label>
            <input type="text" name="email" placeholder="ID" required>
        </div>
        <div class="form-box">
            <label for="password">비밀번호</label>
            <input type="password" id="password"s placeholder="Password" required>
        </div>
        <input type="checkbox">로그인 정보 저장
        <button type="submit" class="btn">로그인</button>
        <a href="{{ route('register') }}">회원가입</a>
    </div>
    </form>
</body>
</html>