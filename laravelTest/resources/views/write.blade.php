<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>write</title>
    <link rel="stylesheet" href="../css/write.css">
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .container-box {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 80%;
      max-width: 600px;
    }
    
    .container-box h2 {
      margin-top: 0;
      text-align: center;
    }
    
    .form-box {
      margin-bottom: 15px;
    }
    
    .form-box label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    .form-box input[type="text"],
    .form-box textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    .form-box textarea {
      height: 150px;
      resize: vertical;
    }
    
    .form-box button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    
    .form-box button:hover {
      background-color: #45a049;
    }
    </style>
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