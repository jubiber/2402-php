// 이벤트

// // 1.함수 표현식
// const FNC1 = (a, b) => a + b;

// //이게 편함
// // 2.함수 선언식 (호이스팅 영향o,재할당o)
// function myFnc1(a, b) {
//     return a + b;
// }

// 1. 인라인 이벤트(거의 안쓰임)
function myAlert() {
    alert('안녕하세요. myAlert()');
}

// 2. 프로퍼티 리스너 (적극활용x)
const btn2 = document.querySelector('#btn2');
// btn2.onclick = () => (alert('안녕하세요.'));
btn2.onclick = myAlert;

// ---------------
// 3. addEventListner방식을 가장 많이 사용함
const BTN3 = document.querySelector('#btn3');
BTN3.addEventListener('click', () => (alert('버튼 3')));
BTN3.addEventListener('click', test);

// 이벤트 추가시 사용했던 이벤트 형식과 콜백함수가 완전 동일해야 한다.
 BTN3.addEventListener('click', function(){
    alert('버튼 31111111111111111111111111111');
}); // 제거 안됨
// removeEventListner()
BTN3.removeEventListener('click', test); // 제거.

function test() {
    alert('test함수 알러트');
}

// 이벤트 객체
const BTN4 = document.querySelector('#btn4');
BTN4.addEventListener('click', e => {
    console.log(e);
    console.log(e.target.value);
    e.target.style.color = 'red';
});

// ---------------------------------------------
// 팝업 (버튼 클릭 시 네이버창 바로 이동)
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    // open 앞에 윈도우. 생략됨
    open('https://naver.com', '', 'width=500 height=500');
});

//모달 (dblclick -> 더블클릭)
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', () => {
    const MODAL_CONTAINER = document.querySelector('.modal-container');
    MODAL_CONTAINER.classList.toggle('display-none');
});
function toggleModalContainer() {
    const MODAL_CONTAINER = document.querySelector('.modal-container');
    MODAL_CONTAINER.classList.toggle('display-none');
}

// 모달 컨테이너 영역 클릭시 모달 닫기
const MODAL_CONTAINER = document.querySelector('.modal-container');
MODAL_CONTAINER.addEventListener('click', toggleModalContainer);

// 모달 아이템 영역 눌렀을 때 안꺼지게 하는법 (꼼수 방법임)
const TEST = document.querySelector('.modal-item');
TEST.addEventListener('click', toggleModalContainer);


// 마우스를 눌렀을 때 이벤트 (add 어쩌고 -> 눌렀을 때 이동 이라고 이해하며면 됨)
const H1 = document.querySelector('h1');
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'red';
});
// 마우스를 뗐을 때 이벤트
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = '#fff';
});
//아래 2개는 같이 설정해야 시야확인 가능한 듯?
// 마우스 포인터가 진입했을 때 이벤트 
 H1.addEventListener('mouseenter', e => {
     e.target.style.color = 'orange';
 });
 // 마우스 포인터가 벗어났을 때 이벤트
 H1.addEventListener('mouseleave', e => {
     e.target.style.color = '#000';
 });

 //더블클릭도 있음













