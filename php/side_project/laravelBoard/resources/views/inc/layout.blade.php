<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UQ-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/css/myCommon.css">
    <script src="/js/bootstrap/bootstrap.js" defer></script>
    @yield('script')
    <title>@yield('title', '미니')</title>
</head>
<body class="@yield('bodyClassVh')">


    @include('inc.header')

    @yield('main')

    @include('inc.footer')
</body> 
     
</html>