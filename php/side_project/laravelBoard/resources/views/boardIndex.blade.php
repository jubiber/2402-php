@extends('inc.layout')


@section('title', '게시판')


@section('script')
  <script src="/js/board.js" defer></script>
  <script src= "https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection



@section('main')
<h1>{{$boardNameInfo->name}}</h1>
<div class="text-conter mt-5 mb-5">
<svg 
    xmlns="http://www.w3.org/2000/svg" 
    width="50" height="50" 
    fill="currentColor" 
    class="bi bi-patch-plus" 
    viewBox="0 0 16 16"
    data-bs-toggle="modal"
    data-bs-target="#modalInsert"
    >
    <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
  </svg>
</div>
<main>
  @foreach($data as $item)
  <div class="card" id="card{{$item->id}}">
    <img src="{{$item->img}}" class="card-img-top">
    <div class="card-body">
    <h5 class="crad-title">{{$item->title}}</h5>
    <p class="card-text">{{$item->content}}</p>
    <button 
        href="#" 
        class="btn btn-secondary my-btn-detail" 
        data-bs-toggle="modal"
        data-bs-target="#modalDetail"
        value="{{$item->id}}">가보자고</button>
    </div>
  </div>
  @endforeach

</main>

<!-- 상세 모달 -->
<div class="modal" tabindex="-1" id="modalDetail">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" >
        <div class="modal-header">
        <h5 class="modal-title">쿠로미 개발자입니다!</h5>
        </div>
        <div class="modal-body">
          <p>댕댕이 모자를 썼어요</p>
          <br>
          <img src="./img/kuromi.jpg" class="card-img-top" alt="쿠로미">
        </div>
        <div class="modal-footer justify-content-between">
          <div>
            <button id="my-btn-delete" type="button" class="btn btn-warning" data-bs-dismiss="modal">삭제</button>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 작성 모달 -->
<div class="modal" tabindex="-1" id="modalInsert">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('board.store}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- TODO :type 설정 필요 -->
        <input type="hidden" name="type" value="{{$boardNameInfo->type}}">
        <div class="modal-header">
          <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요.">
        </div>
        <div class="modal-body">
          <textarea  class="form-control" name="content" col="30" rows="10" placeholder="내용을 입력하세요."></textarea>
          <br><br>
          <input type="file" accept="image/*" name="file">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
          <button type="submit" class="btnbtn-primary">작성</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection



































