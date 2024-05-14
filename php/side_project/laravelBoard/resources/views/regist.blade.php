@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '회원가입')

{{-- 회원가입용 js --}}
@section('script')
<script src="/js/regist.js" defer></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')

{{-- 메인 --}}
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form stype="width: 300px" action="{{route('regist.store')}}" method="post">
      @csrf
      @if($errors->any())
      <div class="form-text text-danger">
      @foreach($errors->all() as $error)
      <span>{{$error}}</span>
      @endforeach
      </div>
      @endif
      
      <label for="email" class="form-label">이메일</label>
      <span id="print-chk-email"></span>
      <button id="btn-chk-email" type="button" class="btn btn-success float-end">중복 확인</button>
      <input type="text" class="form-control mb-3" nama="email" id="email">

      <label for="password" class="form-label">비번</label>
      <input type="text" class="form-control mb-3" name="password" id="password">

      <label for="name" class="form-label">이름</label>
      <input type="text" class="form-control mb-3" name="name" id="name">

      <button id="my-btn-complete" type="submit"  disabled="disabled" class="btn btn-dark">완료</button>
      <a href="{{route('get.login')}}" class="btn btn-secondary float-end">취소</a>
    </form>
</main>
@endseciton

