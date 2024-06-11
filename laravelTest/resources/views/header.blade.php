<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
<link rel="stylesheet" href="../header.css">
  <style>
    ul {
    list-style: none;
  }
  /* CSS 파일에 추가할 스타일 */
  .logo {
      width: 350px; 
      height: 150px; 
  }
  .grid-container {
    display: flex; 
    list-style-type: none; 
    padding: 0;  
  }

  .grid-container li {
      margin-right: 20px; 
  }
  .search-form {
    display: flex
  }
  .search-headr-small {
    display: flex; 
    padding: 0; 
  }
  .login-header a {
    text-decoration: none; 
    color: rgb(100, 100, 100); 
  }

  .login-header a:hover {
      border-bottom: 1px solid rgb(85, 85, 85);
  }
  .search-form {
    display: flex;
    align-items: center;
    width: 400px;
  }
  /* 상단 검색 */
  .search-form input[type="text"] {
      flex: 1; 
      padding: 12px; 
      border: 1px solid #9e9e9e;
      border-radius: 2px; 
      
  }

  .search-form button {
      background-color: white; 
      padding: 10px 20px; 
      border: 1px solid #7e7e7e; 
      border-radius: 2px;
      color: #4b4b4b; 
      margin-left: 10px;
      transition: background-color 0.3s ease; 
  }

  .search-form button:hover {
      background-color: #007bff; 
      color: white; 
  }
  .search-header-small {
    display: flex; /* Flexbox를 사용하여 요소를 가로로 정렬 */
  }
  .search-header-small > div {
      flex: 1; 
      padding: 10px; 
      border: 1px solid #ccc;
      margin: 0 5px; 
  }
  </style>
</head>
<body>
    <div class="header">
      <div class="search-header-large">
        <div class="login-header">
          <ul class="grid-container">
            <li><a href="#">회원가입</a></li>
            <li><a href="#">로그인</a></li>
            <li><a href="#">장바구니</a></li>
            <li><a href="#">고객센터</a></li>
          </ul>
        </div>
        <div class="search-header-small">
          <div class="logo-img">
            <!-- 이미지 파일을 호출하는 코드 -->
            <img src="{{ asset('images/logo.PNG') }}" alt="로고 이미지" class="logo">
          </div>
          <div class="search">
            <form class="search-form" action="/search" method="get">
              <input type="text" name="q" placeholder="검색어를 입력하세요.">
              <button type="submit">검색</button>
            </form>          
          </div>
          <div class="hold"></div>
        </div>
      </div>
      <div class="hamburger-header">
        <section>
          카테고리
          <option value=""></option>
          <option value=""></option>
          </section>
      </div>
    </div>
</body>
</html>