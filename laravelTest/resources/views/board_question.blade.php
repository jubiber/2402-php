<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>board</title>
  <link rel="stylesheet" href="../css/board.css">
</head>
<body>
   <div class="board_container">
    <div class="board_header_img">
      <img src="" alt="">
    </div>
    <div class="board_menu">
      <ul>
        <li><a href="{{ route('board_free') }}">자유게시판</a></li>
        <li><a href="{{ route('board_question') }}">질문게시판</a></li>
        <li><a href="{{ route('board_inquiry') }}">문의게시판</a></li>
     
      </ul>
    </div>
    <div class="board_main">
            <h1>질문 게시판</h1>
            <div class="board_search">
                <input type="text" id="searchInput" placeholder="검색어를 입력하세요.">
                <button onclick="search()">검색</button>
            </div>
        </div>
      <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>닉네임</th>
                <th>등록일</th>
            </tr>
        </thead>
        <tbody id="board-table-body">
            <tr>
                <td>1</td>
                <td>첫 번째 게시물</td>
                <td>관리자</td>
                <td>2024-06-16</td>
            </tr>
            <tr>
                <td>2</td>
                <td>두 번째 게시물</td>
                <td>사용자</td>
                <td>2024-06-15</td>
            </tr>
            <tr>
                <td>3</td>
                <td>세 번째 게시물</td>
                <td>관리자</td>
                <td>2024-06-14</td>
            </tr>
            <tr>
                <td>4</td>
                <td>네 번째 게시물</td>
                <td>주임</td>
                <td>2024-06-13</td>
            </tr>
            <tr>
                <td>4</td>
                <td>네 번째 게시물</td>
                <td>관리자</td>
                <td>2024-06-14</td>
            </tr>
        </tbody>
      </table>
      <li><a href="write.html">글쓰기</a></li>
      <div class="pagination" id="pagination"></div>
    </div>
   </div> 
   <script src="../js/board.js"></script> 
</body>
</html>