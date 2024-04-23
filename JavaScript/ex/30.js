// // Date 객체

// // 요일 한글로 변환 함수
// const changeDayToKoreanDay = num => {
//     switch(num) {
//         case 0:
//             return '일요일';
//         case 1:
//             return '월요일';
//         case 2:
//             return '화요일';
//         case 3:
//             return '수요일';
//         case 4:
//             return '목요일';
//         case 5:
//             return '금요일';
//         case 6:
//             return '토요일';
//     }
// }

// // 앞에 0을 추가해주는 함수
// // var -> 값, length -> 최종 문자 길이
// //lpadZero(7, 2)라고 호출한다면, 주어진 값을 7을 문자열로 반환
// // -> 그 문자열의 왼쪽에 길이가 2가 될때까지 0 추가해서 최종 "07"을 반환함
// // 숫자나 문자열 특정길이로 맞추는데 유용함
// const lpadZero = (val, length) => {
//     return String(val).padStart(length, '0');
// }
// //php에서는 이렇게 썼었음
// // function lpadZero(val, length) {
// //     return String(val).padStart(length, '0');
// // }

// // 현재날짜/시간 획득
// // 뉴 데이트 써서 date 객체를 인스턴스화 시켜줌
// // NOW 변수에 현재 시간 정보가 감. 
// const NOW = new Date();

// // getFullYear() : 연도만 가져오는 메소드 (yyyy)
// // getYear랑 구분!
// const YEAR = NOW.getFullYear();

// // getMonth() : 월만 가져오는 메소드, 0 ~ 11을 획득
// // 특징: 꼭 +1 해줘야함.
// const MONTH = lpadZero(NOW.getMonth() + 1, 2);

// // getDate() : 일을 가져오는 메소드
// const DATE = lpadZero(NOW.getDate(), 2);

// // getHours() : 시를 가져오는 메소드
// const HOUR = lpadZero(NOW.getHours(), 2);

// // getminutes() : 분을 가져오는 메소드
// const MINUTE = lpadZero(NOW.getMinutes(), 2);

// // getSecondes() : 초를 가져오는 메소드
// const SECOND = lpadZero(NOW.getSeconds(), 2);

// // getMilliseconds() : 미리초를 가져오는 메소드
// const MILLISECOND = lpadZero(NOW.getMilliseconds(), 3);

// // getDay() : 요일을 가져오는 메소드 0(일)~6(토) 반환
// const DAY = NOW.getDay();

// const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTE}:${SECOND}.${MILLISECOND} ${changeDayToKoreanDay(DAY)} `;
// console.log(FOMAT_DATE);

// // getTime() : UNIX 타임스탬프를 반환
// const TIME = NOW.getTime();
// // 일수 차이
// const TARGET_DATE = new Date('2024-04-03 00:00:00');

// const DIFF_DATE = Math.floor(Math.abs(TARGET_DATE - NOW) / 86400000)

// 1000*60*60*24 = 86400000

// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇개월 후 입니까?
//먼쓰 1월이 0부터 시작주의 (자바스크립트)
const TARGET_DATE1 = new Date(2024, 0, 1, 13);
const TARGET_DATE2 = new Date('2025-05-30 00:00:00');
const DIFF_DATE2 = Math.floor(Math.abs(TARGET_DATE1 - TARGET_DATE2) / (1000*60*60*24*30));












