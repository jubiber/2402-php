<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>자유게시판</title>
  <link rel="stylesheet" href="../css/board.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      width: 90%;
      max-width: 800px;
      margin-top: 20px;
    }

    .post-list {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .post-item {
      background-color: white;
      padding: 20px;
      margin-bottom: 10px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .post-item h2 {
      margin: 0 0 10px 0;
    }

    .post-item p {
      margin: 0;
    }
  </style>
</head>
<body>
  <header>
    <h2>자유게시판</h2>
  </header>
  <div class="container">
    <ul class="post-list" id="posts-container">
      <!-- 게시글들이 여기에 추가됩니다 -->
    </ul>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // JSON 데이터로부터 게시글 목록을 가져옵니다.
      const posts = [
        { title: "첫 번째 글", content: "이것은 첫 번째 게시글의 내용입니다." },
        { title: "두 번째 글", content: "이것은 두 번째 게시글의 내용입니다." },
        { title: "세 번째 글", content: "이것은 세 번째 게시글의 내용입니다." }
      ];

      const container = document.getElementById("posts-container");

      posts.forEach(post => {
        const postItem = document.createElement("li");
        postItem.className = "post-item";

        const postTitle = document.createElement("h2");
        postTitle.textContent = post.title;

        const postContent = document.createElement("p");
        postContent.textContent = post.content;

        postItem.appendChild(postTitle);
        postItem.appendChild(postContent);
        container.appendChild(postItem);
      });
    });
  </script>
</body>
</html>
