@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))


@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <div>
        <h2>404 error</h2>
        <p>존재x 페이지입니다</p>
        <a href="{{route('get.login')}}">로그인 page로 돌아가기</a>
    </div>
</main>