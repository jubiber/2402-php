<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
  <script src="/view/js/bootstrap/bootstrap.js" defer></script>
  <title>회원 정보 수정</title>
</head>
<body class="vh-100">
   <!-- 헤더 -->
   <?php require_once("view/inc/header.php"); ?>
  <!-- <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">미니보드</a>
      </div>
    </nav>
  </header> -->

  <main class="d-flex justify-content-center align-items-center h-75">
    
    <form style="width: 300px" action="/user/edit" method="post">
      <?php require_once("view/inc/errorMsg.php"); ?>
      <h1>회원정보 수정</h1>
      <label for="u_name" class="form-label">이름</label>
      <input type="text" class="form-control mb-3" id="u_name" name="u_name" value="<?php echo $u_name; ?>">
      <label for="u_pw" class="form-label">비밀번호</label>
      <input type="password" class="form-control mb-3" id="u_pw" name="u_pw">
      <label for="u_pw_check" class="form-label">비밀번호 확인</label>
      <input type="password" class="form-control mb-3" id="u_pw_check" name="u_pw_check">
      <!-- <input type="password" class="form-control mb-3" id="u_pw" name="u_pw">
      <button type="submit" class="btn btn-dark">로그인</button> -->
      <button id="my-btn-complete" type="submit"  class="btn btn-dark ">수정</button>
      <a href="/user/login" class="btn btn-secondary float-end">취소</a>
    </form>
  </main>

  <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
</body>
</html>