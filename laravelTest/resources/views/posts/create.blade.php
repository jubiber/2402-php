<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글 작성</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <h2>글 작성</h2>
    <form action="{{ route('posts.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">제목</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="content">내용</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">작성</button>
    </form>
  </div>
</body>
</html>
