<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>자유게시판</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <h2>자유게시판</h2>
    <ul class="list-group">
      @foreach($posts as $post)
        <li class="list-group-item">
          <h3>{{ $post->title }}</h3>
          <p>{{ $post->content }}</p>
          <small>작성자: {{ $post->user->name }}</small>
        </li>
      @endforeach
    </ul>
  </div>
</body>
</html>
