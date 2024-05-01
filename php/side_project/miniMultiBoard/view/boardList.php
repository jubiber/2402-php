<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 부트스트랩(검색) -> 다운로드 -> jsDeliver를 통한 CDN -> LINK2 복붙-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>free게시판</title>
    <!-- view 앞에 적어주면 css 파일 불러올 수 o -->
    <link rel="stylesheet" href="/view/css/myCommon.css">
</head>
<body>
    <!-- 부스트스랩(검색) -> 컴포넌트 -> 내비게이션 바 -> Navbar -> 복붙
     -->
     <!-- 중요: 구조 분석 -> 수정-->
     <!-- 넘 길(단점) -->
     <!-- lg -> 뷰포트 -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">미니보드</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
        
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  게시판
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="./free.html">자유게시판</a></li>
                  <li><a class="dropdown-item" href="./question.html">질문게시판</a></li>
                </ul>
              </li>
            </ul>
            <!-- role -> 나중에쓰는데 일단oo -->
            <!-- a 태그에 class로 nav-link로 주면 밑줄을 없애줌 -->
            <a href="./login.html" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
          </div>
        </div>
      </nav>
      <!-- 부트스트랩 -> 유틸리티 -> 간격 -->
      <div class="text-center mt-5 mb-5">
        <h1>자유게시판</h1>
        <!-- 이미지 -> 부트스트랩 -> 아이콘 -->
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="50" height="50" 
            fill="currentColor" 
            class="bi bi-patch-plus" 
            viewBox="0 0 16 16"
            data-bs-toggle="modal"
            data-bs-target="#modalInsert"
            >
            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
            <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
          </svg>
      </div>
      <main>
        <!-- 컴포넌트 -> 카드 -->
        <div class="card">
            <img src="./img/k.jpg" class="card-img-top" alt="쿠로미">
            <div class="card-body">
              <h5 class="card-title">쿠로미 마을</h5>
              <p class="card-text">Some quick example text to build on the 쿠로미 마을 and make up the bulk of the card's content.</p>
              <button 
                href="#" 
                class="btn btn-secondary "
                data-bs-toggle="modal"
                data-bs-target="#modalDetail">가보자고</button>
            </div>
          </div>
          <div class="card">
            <img src="./img/k.jpg" class="card-img-top" alt="쿠로미">
            <div class="card-body">
              <h5 class="card-title">쿠로미 마을</h5>
              <p class="card-text">Some quick example text to build on the 쿠로미 마을 and make up the bulk of the card's content.</p>
              <button 
                href="#" 
                class="btn btn-secondary "
                data-bs-toggle="modal"
                data-bs-target="#modalDetail">가보자고</button>
            </div>
          </div>
          <div class="card">
            <img src="./img/k.jpg" class="card-img-top" alt="쿠로미">
            <div class="card-body">
              <h5 class="card-title">쿠로미 마을</h5>
              <p class="card-text">Some quick example text to build on the 쿠로미 마을 and make up the bulk of the card's content.</p>
              <button 
                href="#" 
                class="btn btn-secondary "
                data-bs-toggle="modal"
                data-bs-target="#modalDetail">가보자고</button>
            </div>
          </div>
          <div class="card">
            <img src="./img/k.jpg" class="card-img-top" alt="쿠로미">
            <div class="card-body">
              <h5 class="card-title">쿠로미 마을</h5>
              <p class="card-text">Some quick example text to build on the 쿠로미 마을 and make up the bulk of the card's content.</p>
              <button 
                href="#" 
                class="btn btn-secondary "
                data-bs-toggle="modal"
                data-bs-target="#modalDetail">가보자고</button>
            </div>
          </div>
          <div class="card">
            <img src="./img/k.jpg" class="card-img-top" alt="쿠로미">
            <div class="card-body">
              <h5 class="card-title">쿠로미 마을</h5>
              <p class="card-text">Some quick example text to build on the 쿠로미 마을 and make up the bulk of the card's content.</p>
              <button 
                href="#" 
                class="btn btn-secondary "
                data-bs-toggle="modal"
                data-bs-target="#modalDetail">가보자고</button>
            </div>
          </div>
      </main>
     <!-- padding -> p로 주면 됨
    margin -> m -->
      <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
      <!-- 가보자고 모달 -->
      <div class="modal" tabindex="-1" id="modalDetail">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="">
                <div class="modal-header">
                <h5 class="modal-title">쿠로미 개발자입니다!</h5>
                </div>
                <div class="modal-body">
                    <p>댕댕이 모자를 썼어요</p>
                    <br>
                    <img src="./img/k.jpg" class="card-img-top" alt="쿠로미">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- 부트스트랩 -> 모달 -> 모달컴포넌트 -> 복사 -->
      <div class="modal" tabindex="-1" id="modalInsert">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="">
                <div class="modal-header">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="제목을 입력해 주세요.">
                </div>
                <div class="modal-body">
                  <textarea class= "form-control"  cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
                  <input type="file" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-Light" data-bs-dismiss="modal">닫기</button>
                    <button type="button" class="btn btn-secondary">작성</button>
                </div>
            </form>
          </div>
        </div>
      </div>
</body>
</html>