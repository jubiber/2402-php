// leftPadZero 함수는 세개의 매개변수를 받음
// target (문자열or 숫자)
//length 최종 문자열 길이
// fillStr 채워질 문자열이나 숫자 ( 이 값으로  target이 length에 도달할 때까지 채워짐)
// ex leftPadZero(5, 4, '0')을 호출하면 '5'를 왼쪽에 0으로 채워서 길이가 4가 되도록 함
const leftPadZero = (target, length, fillStr) => {
    return String(target).padStart(length, fillStr);

}


// 1. 시계 부분 만들기 오전 09:10:30
const GET_DATE = () => {
    const NOW = new Date(); // Date 객체(현재시간) 생성
    let HOUR = NOW.getHours(); // 시간 획득(24시 포맷)
    let MINUTE = NOW.getMinutes(); // 분 획득
    let SECOND = NOW.getSeconds(); // 초 획득
    let ampm = '오전'; // 오전, 오후
    let hour_12 = 0; // 시간(12시 포맷)

    if(HOUR > 12) {
        ampm = '오후';
        hour_12 = HOUR - 12;
    }

    // 출력 시간
    let printTime = 
        ampm + ' ' 
        + leftPadZero(hour_12,2, '0') + ':'
        + leftPadZero(MINUTE,2, '0') + ':'
        + leftPadZero(SECOND,2, '0');
        console.log(printTime,);

    const SPAN_TIME = document.querySelector('#time');
    SPAN_TIME.textContent = printTime;
}   
GET_DATE();    
let intervalID = setInterval(GET_DATE, 1000);

// 2. 멈춰 버튼
const BTN_STOP = document.querySelector('#btn-stop');
BTN_STOP.addEventListener('click', () => {
    clearInterval(intervalID);
});

// 3. 재시작 버튼
const BTN_RESTART = document.querySelector('#btn-restart');
BTN_RESTART.addEventListener('click', () => {
    // 재시작 버튼 릭 시 딜레이 막아줌
    GET_DATE(); // 재시작 버튼 클릭과 동시에 현재시간 화면에 띄우기 위한 처리 
    
    intervalID = setInterval(GET_DATE, 1000);
})