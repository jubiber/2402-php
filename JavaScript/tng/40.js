// e => event의 약자
//함수 표현식 사용(호이스팅 영향x, 재할당x )
const myDokidoki = () => {
    alert('두근두근');
 
}

const myBusted = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    
    alert('들켰다.');
    const DIV_BOX = document.querySelector('.box');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myBusted); // 기존 들켰다 event 제거
    // 숨는다 이벤트 추가
    DIV_BOX.addEventListener('click',myHide)

    DIV_CONTAINER.removeEventListener('mouseenter', myDokidoki); // 기존 두근두근 이벤트 제거
}
// 함수 숨는다
const myHide = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    const DIV_BOX = document.querySelector('.box');
    alert('숨는다.');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myBusted); // 기존 숨는다 이벤트 제거
    DIV_BOX.addEventListener('click', myHide);
    DIV_CONTAINER.addEventListener('mouseenter', myDokidoki);
    
    //랜덤 위치 조절
    // 랜덤값 * (브라우저 너비|높이 - div.container 너비|높이)의 반올림
    // 'Math.round()' 함수를 사용하여 소수점 이하를 반올림하여 정수값을 얻는다.
    // 'Math.random()' 함수는 0과 1사이의 무작위 부동 소수점 숫자를 반환함.
    // 0부터 500 사이의 무작위한 값을 생성하여 요소를 해당  범위 내에서 무작위로 위치시킨다.
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - DIV_CONTAINER.offsetWidth));
    const RANDOM_Y = Math.round(Math.random() * (window.innerHeight.innerHeight - DIV_CONTAINER.offsetHeight));
    // 얻은 무작위한 정수값을 'RANDOM_X'와 'RANDOM_Y'에 각각 할당한다.
    DIV_CONTAINER.style.top = `${RANDOM_Y}px`;
    DIV_CONTAINER.style.left = `${RANDOM_X}px`;
}
// 즉시실행함수
(() => {


// 1. 버튼 클릭 시 아래 내용의 알러트가 나옵니다.
    // "안녕하세요."
    // "숨어있는 div를 찾아보세요."
const BTN_INFO = document.querySelector('#btn-info');
BTN_INFO.addEventListener('click', () => (alert('안녕하세요.\n숨어있는 div를 찾아보세요')));

// 2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
    // "두근두근"
const DIV_CONTAINER = document.querySelector('.container');
//마이도키도키 뒤에 괄호 안쓰는 이유 -> 마우스 엔터가 일어났을 때 함수를 호출해야하므로.
//함수실행이 아니라 이 함수를 보내는거임
DIV_CONTAINER.addEventListener('mouseenter',myDokidoki);


// 2-2. 들킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야 합니다.
    // 특정 영역에 마우스 진입시 알림을 한 번만 표시하는 함수 정의


// 3. 2번 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
    // "들켰다!"
const DIV_BOX = document.querySelector('.box');
DIV_BOX.addEventListener('click', myBusted);

//4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 베경색이 흰색으로 바귀어 안보이게 됩니다.
    // "다시 숨는다."
})();
// 4-2 다시 숨을 때 위치 랜덤