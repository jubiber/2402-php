<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    {{-- CSRF 방지
     라라벨은 세션마다 CSRF 토큰을 자동으로 생성하고, 이 토큰으로
     인증된 사용자가 실제로 애플리케이션에서 요청을 했는지 확인 --}}
    <h1>HOME!!!!</h1>
    <br>
    <br>
    {{-- POST --}}
    <form action="/home" method="POST">
     @csrf
    <button type="submit">POST</button>
    <br>
    <br>
    {{-- PUT --}}
    <form action="/home" method="POST">
     @csrf
     @method('PUT')
     <button type="submit">PUT</button>
    </form>
    {{-- PATCH --}}
    <form action="/home" method="POST">
     @csrf
     @method('PATCH')
     <button type="submit">PATCH</button>
    </form>
    <br>
    <br>
    {{-- DELETE --}}
</form>
</body>
</html>