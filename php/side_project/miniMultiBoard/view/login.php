<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 부트스트랩(검색) -> 다운로드 -> jsDeliver를 통한 CDN -> LINK2 복붙-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>login게시판</title>
    <link rel="stylesheet" href="/view/css/myCommon.css">
</head>
<body class="vh-100">
    <!-- 부트스트랩(검색) -> 컴포넌트 -> 내비게이션 바 -> Navbar -> 복붙
     -->
     <!-- 중요: 구조 분석 -> 수정-->
     <!-- 넘 길(단점) -->
     <header>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">미니보드</a>
        </div>
     </header>
     <!-- 컴포넌트 -> 캐러샐, 아코디언      -->
     <main class="d-flex justify-content-center align-items-center h-75">
          <form style="width: 300px" action="/user/login" method="post">
            <div class="form-text text-danger">에러에러에서</div>
            <div class="mb-3">
              <label for="u_email" class="form-label">아이디</label>
              <input type="email" class="form-control" id="u_email" name="u_email">
            </div>
            <div class="mb-3">
              <label for="u_pw" class="form-label">비밀번호</label>
              <!-- mb-3 -> 마진 -->
              <input type="password" class="form-control mb-3" id="u_pw" namd="u_pw">
            </div>
          <button type="submit" class="btn btn-dark">로그인</button>
        </form>
      </div>
     </main>
     <!-- 박T 풀이 -->
     <!-- d-flex: Flexbox 레이아웃을 사용하여 자식 요소를 수평으로 정렬합니다. -->
     <!-- justify-content-center: 수평으로 가운데 정렬합니다. -->
     <!-- align-items-center: 수직으로 가운데 정렬합니다. -->
     <!-- h-75: 높이를 75%로 설정합니다. -->
     <!-- <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 300px" action="./free.html">
          <div class="form-text text-danger">에러에러에서</div>
          <div class="mb-3">
            <label for="u_id" class="form-label">아이디</label>
            <input type="text" class="form-control mb-3" id="u_id">
            <label for="u_pw" class="form-label">비밀번호</label>
            <input type="password" class="form-control mb-3" id="u_pw">
            <button type="submit" class="btn btn-dark">로그인</button>
          </div>
        </form>
     </main> -->
     <br>
     <footer>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand " href="#">저작권</a>
        </div>
     </footer>
</body>
</html>