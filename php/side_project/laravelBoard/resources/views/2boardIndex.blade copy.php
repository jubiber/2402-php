<script src="/js/board.js" defer></script>
<script src= "https://unpkg.com/axios/dist/axios.min.js"></script>


<h1>자유게시판</h1>
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
  <div class="card">
    <img src="" alt="" class="src">
    <div class="card-body">
    <h5 class="crad-title">{{$item->title}}</h5>
    <p class="card-text">{{$item->content}}</p>
    <button 
        href="" 
        class="" 
        data-bs-toggle="modal"
        data-bs-target="#modalDetail"
        value="{{$item->id}}">가보자고</button>
    </div>
  </div>
  @endforeach
</main>
<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" >
        <div class="modal-header">
          <h5 class="modal-title">쿠로미 개발자입니다!</h5>
        </div>
        <div class="modal-body">
          <p>댕댕이 모자를 썼어요</p>
          <br>
          <img src="" alt="">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary"></button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="">
        @csrf
        <!-- TODO :type 설정 필요 -->
        <input type="hidden">
        <div class="modal-header">
          <input type="text">
        </div>
        <div class="modal-body">
          <textarea name="" id="" class="form-control"></textarea>
          <input type="text">
        </div>
        <div class="modal-footer">
          <button type="">닫기</button>
          <button type="">작성</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection