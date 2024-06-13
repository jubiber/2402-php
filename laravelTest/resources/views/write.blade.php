<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>write</title>
    <link rel="stylesheet" href="../css/write.css">
</head>
<body>
  <div class="container-box">
    <h2>글 작성 게시판</h2>
    <form action="/submit" method="POST">
        <div class="form-box">
            <label for="title">제목</label>
            <input type="text" id="title" name="title" placeholder="제목을 입력하세요" required>
        </div>
        <div class="form-box">
            <label for="content">내용</label>
            <textarea name="content" id="content" placeholder="내용을 입력하세요" required></textarea>
        </div>
        <div class="form-box">
            <button type="submit">작성</button>
        </div>
    </form>
  </div>
</body>
</html>