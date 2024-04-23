// Math 객체

// 올림, 반올림, 버림
Math.ceil(0.1); // 1
Math.round(0.5); // 1
//정확도 떨어짐.
Math.floor(0.9); // 0

// 랜덤값
Math.random(); // 0 ~ 1 랜덤한 수를  반환
// 1~10 랜덤 숫자 획득
Math.ceil(Math.random() * 10);


// for(let i = 0; i < 100; i++) {
//     console.log(Math.ceil(Math.random() * 10));
// }

// 최대값, 최소값, 절대값
const ARR = [6,3,4,65,87,8,3,2];
let max = Math.max(...ARR);
console.log(max);

let min = Math.min(...ARR);
console.log(min);

//절댓값
Math.abs(1);
Math.abs(-1);





