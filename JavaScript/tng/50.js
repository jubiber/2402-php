
// 2-2. 들킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야 합니다.


// 1. 버튼 클릭 시 아래 내용의 알러트가 나옵니다.
    // "안녕하세요."
    // "숨어있는 div를 찾아보세요."
const BTN1 = document.querySelector('#btn1');

BTN1.addEventListener('click', () => 
(alert('"안녕하세요"')));
BTN1.addEventListener('click', test);

BTN1.addEventListener('click', function(){
    alert('"숨어있는 div를 찾아보세요."');
});
BTN1.removeEventListener('click', test);

function test() {
    alert('sdf');
}
// 2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
    // "두근두근"

const divElement = document.querySelector('.item');

// 특정 영역에 마우스 진입시 알림을 한 번만 표시하는 함수 정의
function showAlertOnce() {
    alert('"두근두근"');
    divElement.removeEventListener('mouseenter', showAlertOnce);
}
divElement.addEventListener('mouseleave', e => {
    e.target.style.backgroundColor = 'beige';
});
// 특정 영역에 마우스 진입 이벤트 리스너를 추가함.
divElement.addEventListener('mouseenter', showAlertOnce);

// 특정 영역에서 마우스를 눌렀을 때의 이벤트 리스너를 추가함.
divElement.addEventListener('mouseup', e => {
    e.target.style.color = 'orange';
});


// 3. 2번 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
    // "들켰다!"

divElement.addEventListener('mousedown', () => {
     alert('"들켰다!"');
     divElement.style.backgroundColor = 'white';
});
divElement.addEventListener('mouseup', () => {
    divElement.style.backgroundColor = 'orange';
});
// divElement.addEventListener('mouseup', e => {
//     e.target.style.backgroundColor = '#fff';
// });



//4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 베경색이 흰색으로 바귀어 안보이게 됩니다.
    // "다시 숨는다."


divElement.addEventListener('mousedown', function(){
    alert('"다시 숨는다."');
});
divElement.removeEventListener('mousedown', test);


function test() {
    alert('sdf');
}
// 보완: 마지막에 색깔 사라져야하는거
// 3번이랑 4번 사이에 텀두게
// 2-2 충족하게
