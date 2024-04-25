// 1. 현재 시간을 화면에 표시
// const newText = document.createTextNode('현재 시각 오후');
// const newElement = document.createElement('content');
// newElement.appenChild(newText);
// document.getElementById('content').appendChile(newElement);
// 2. 실시간으로 시간을 화면에 표시
// const clock = document.querySelector(".clock");


// const now = new Date(); // 현재 날짜 및 시간
// console.log(now);

// 연도
// const year = now.getFullYear(); 
// console.log(year)
//월
// const month = now.getMonth(); // 월
// console.log(month);
// //일
// const date = now.getDate();
// console.log("일 : ", date);


let intervalId; // setInterval의 ID를 저장할 변수

function clock() {
    let timetext = document.querySelector('h2'); // h2 태그 가져오기
    let today = new Date(); // 날짜랑 시간
    let H = today.getHours(); // 시간
    let M = today.getMinutes(); // 분
    let S = today.getSeconds(); //초

    H = (H < 10) ? '0' + H : H;
    M = (M < 10) ? '0' + M : M;
    S = (S < 10) ? '0' + S : S;

    timetext.innerHTML = `현재 시각 오후 ${H}:${M}:${S}`; //html 에 출력
}
clock(); // 초기에 한 번 시간을 출력

//1초마다 clock 함수를 실행하여 현재 시간을 갱신
intervalId = setInterval(clock,1000); //1초마다 clock함수 실행

const BTN = document.querySelector('#btn');

BTN.addEventListener('click', () => {
    // 여기 id=clock 멈추는게 들어가야함.-> btn으로 작동
    clearInterval(intervalId);
});

const BTN2 = document.querySelector('#btn2');

BTN2.addEventListener('click', () => {
    //재시작 클릭 시 고정?어쩌고 위해
    // 이거 두는게 낫다고 하셨음. 수업할 때 설명하신대
    clearInterval(intervalId);
    intervalId = setInterval(clock, 1000);
});








// const now1 = new Date();
// const hours = now.getHours();
// const minutes = now.getMinutes(); //분
// const seconds = now.getSeconds();

// console.log(hours);
// console.log(minutes);
// console.log(seconds);

// const clockElement = document.querySelector('.clock');
// // clock.innerText = `${hour}:${minutes}:${seconds}`;




// function getCurrentClock() {
//     const now = new Date(); // 현재시간 가져옴
//     const hour = now.getHours(); // 시간
//     const minutes = now.getMinutes(); // 분
//     const seconds = now.getSeconds(); // 초
//     const timeString = `${hour < 10 ? '0' + hour : hour}:${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

//     return timeString; // 만든 문자열을 반환
// }
// function displayTime() {
//      const timeString = getCurrentTime(); // 현재 시간 가져옴
//     const clockElement = document.querySelector('.clock'); //표시할 요소 가져옴
//     clockElement.innerText = timeString; // 요소에 현재 시간을 표시
// }
// // 매 초마다 시간 갱신해서 표시
// setInterval(displayTime, 1000);

// getCurrentClock();


// 3. 멈춰 버튼을 누르면, 시간이 정지할 것


// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
