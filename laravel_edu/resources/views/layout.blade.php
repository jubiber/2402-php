<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '부모 타이틀')</title>
</head>
<body>
    {{-- @include : 다른 블레이드 템플릿을 포함시키는 방법 --}}
    @include('layout.header', ['name' => '홍길동'])

    @yield('main')

    {{-- @section ~ @show : 자식 템플릿에 해당하는 section이 없으면 부모코드 실행 --}}
    @section('show')
    <h2>부모 show 입니다.</h2>
    <h3>여러 처리 중</h3>
    @show

    @include('layout.footer')
</body>
</html>