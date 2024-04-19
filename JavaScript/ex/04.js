console.log("js파일에서 안녕하세요.");

// 변수 (중요: var 쓰지마)
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
var num1 = 1; // 최초 선언
// ...생략...
var num1 = 2; // 중복 선언
num1 = 3; // 재할당

// 2015 에크마 어쩌고에 이거 2개 추가됨. (표준에선 이 2개 쓰는거 추천.)
// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let num2 = 2;
// let num2 = 3;
num2 =  5;

// 상수 (중요: const 쓰는거 기억하기)
//const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프 (관습적으로 대문자 사용)
const NUM = 3;
// const NUM = 5;
// NUM = 4;

// ---------
// 스코프
// ---------
// 변수나 함수가 유효한 범위
// 전역, 지역, 블록 3가지의 스코프

// 전역 스코프 (중요: 지역과 구분)
let globalScope = '전역 스코프';

function myPrint() {
    console.log(globalScope);
}

// myPrint();
// console.log(globalScope);

// 지역 스코프 (함수 레벨 스코프랑 비슷함??)
// 함수 내에서 사용 가능.
function myLocalPrint() {
    let localStr = '지역 스코프 let';
    console.log(localStr);
}

// console.log(localStr); (error)

// 블록 레벨 스코프
// {   }로 둘러싸인 범위
function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);

} 

// 호이스팅 (hoisting)
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// var 호이스팅 문제
// console.log(test); //undefined
// test = "aaa"; 
// console.log(test);
// // var test;
// let test;

// 데이터 타입
// number 숫자
let num = 1;

// string 문자열
let str = 'abcde';

// boolean 논리(true/false)
let boo = true;

// null 존재하지 않는 값
let letNull = null;

// undefined 값이 할당 되어 있지 않은 상태
let letUndefined;

// object 객체
let obj = {
    key1: 'val1',
    key2: 'val2'
};

console.log(typeof obj);

// Array 배열 (object)
let arr = [1, 2, 3];

//일반적인 배열은 1 2 3 4 5 6 
//php 는 함수 중앙

// javascript 희소배열


// symbol 심볼 (이런게 ㅇ)
// F12 letStr1 === letStr2 (같)
let letStr1 = '심볼1';
let letStr2 = '심볼1';
// F12 letSymbol1 === letSymbol2 (다르다.)
let letSymbol1 = Symbol('심볼1');
let letSymbol2 = Symbol('심볼1');












































