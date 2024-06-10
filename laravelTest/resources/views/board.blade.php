<!-- resources/views/board.blade.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .header .logo {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            text-decoration: none;
        }
        .header .nav-links a {
            margin-left: 20px;
            color: #343a40;
            text-decoration: none;
        }
        .posts-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .post {
            width: 30%;
            margin: 1%;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #ffffff;
        }
        .post img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .post {
                width: 45%;
            }
        }
        @media (max-width: 576px) {
            .post {
                width: 100%;
            }
        }
        .form-container {
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="{{ route('board') }}">로고</a>
        </div>
        <div class="nav-links">
            <a href="{{ route('profile') }}">내 정보</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">로그아웃</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>
    <main>
        <div class="form-container">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">제목</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="content">내용</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <div>
                    <label for="image">이미지</label>
                    <input type="file" id="image" name="image">
                </div>
                <button type="submit">게시</button>
            </form>
        </div>
        <div class="posts-container">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                    @endif
                    <p>{{ $post->content }}</p>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
