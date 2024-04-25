// 타이머 함수

// setTimeout(콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행
// 병렬처리 (비동기 처리)
// ex) 돔, 에이젝스(많),타이머함수,에드이벤트리스너
setTimeout(() => (console.log('타임아웃')), 5000);

// 1초뒤 A, 2초뒤 B, 3초뒤 C 출력
setTimeout(() => (console.log('A')), 1000);
setTimeout(() => (console.log('B')), 2000);
setTimeout(() => (console.log('C')), 3000);

// 실행 순서?  -> a c b 
console.log('A');
setTimeout(() => console.log('B'), 1000);
console.log('C');

// 실행 순서?  -> a b c
console.log('A');
setTimeout(() => {
    console.log('B');
    console.log('C');
}, 1000);

// clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거
// const TIMEOUT_ID = setTimeout(() => console.log('ttt'), 5000);
// // clear 했으므로 위의 setTimeout 실행x
// clearTimeout(TIMEOUT_ID);
// console.log(TIMEOUT_ID);

// const TIMEOUT_ID2 = setTimeout(() => console.log('ccc'), 5000);
// console.log(TIMEOUT_ID2);

//setInterval(콜백함수, 시간(ms[, 아규먼트1, 아규먼트2])) : 일정 시간마다 콜백함수 실행
// 부연설명:  -> 생략 가능한건 대괄호 안에
// -> if 콜백함수에 파라미터를 실행한다 -> 아규먼트를 순차적으로 실행할 수 있음
const INTERVAL_ID = setInterval(() => {
    console.log('인터벌');
}, 1000);

// clearInterval(intercalID) : 해당 intervalID 처리 제거
clearInterval(INTERVAL_ID);

// 화면에 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 ㄱㄱ.

setTimeout(() => {
    const BODY = document.querySelector('body');
    //createTextNode -> 텍스트 노드 생성하는 메서드
    const text = document.createTextNode('두둥등장');
    //dom에 사용되는 메서드중 하나로, 주어진 노드를 다른 노드의 자식 노드로 추가함
    //ex) <p>(문단)요소를 생성하고 이를 '<body>' 요소의 자식으로 추가할 수 있음
    //body라는 요소에 text라는 텍스트노드를 추가하고, 이를 body의 자식으로 추가한다.
    BODY.appendChild(text);
    console.log('두둥등장');
    BODY.style.fontSize = '200px';
    setTimeout(() => {
        const DEL_TEXT = document.querySelector('body');
        document.body.removeChild(text);
    }, 3000);
}, 5000);


// 박T
setTimeout(() => {
    const H1 =document.createElement('h1'); // h1 태그 생성
    H1.innerHTML = '두둥등장'; // h1태그 컨텐츠 삽입
    H1.style.fontSize = '5rem'; // h1 태그 글자크기 조절

    document.body.appendChild(H1); // body에 h1 추가
    setTimeout(() => {
        const DEL_H1 = document.querySelector('h1');
        document.body.removeChild(DEL_H1);
    }, 3000);
}, 5000);

// 콜백 지옥
// 비동기 처리를 동기 처리처럼 만들기 위해서 아래처럼 콜백 지옥 현상이 생긴다.
setTimeout(() => console.log('A', 3000));
setTimeout(() => console.log('B', 2000));
setTimeout(() => console.log('C', 1000));

setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        }, 1000);
    }, 2000);
}, 3000);










// 결론: 자바스크립트의 비동기 특징 -> 순서 주의할 것.

// 비동기 이론
// heap 메모리 모음 (callstack(LIFO_차곡차곡 쌓아놓고 위부터 처리) 실행 위한)
// caallstack > 순서댇로 처리하는 영역
// Q(FIFO 선입선출방식_ 일단 들어오면 순차적으로 처리) 이용해서 처리함
//
//엑셀 (자바스크립트 병렬처리의 원리) -> 걍 이런게 있구나.
//힙에 함수 저장됨. -> callstack에 콘솔a가 들어감 ->  처리 끝나면 콘솔a가 찍힘
//-> 그다음처리 setTIMEOUT -> web API로 넘김
// ->  CALLSTACK이 지금 비어있읜까 콘솔비 넣고 출력
//-> 1초 지나면 q에 PRINTB를 담음. 
// -> PRINTB를  CALLSTACK이 비면 담음.
/// -> 그 다음 콘솔C를 그 위에 쌓음
// 콘솔C 찍히고 > 
// CALLSTACK은 그냥 맡기는 부분이라 생각하면 됨.




