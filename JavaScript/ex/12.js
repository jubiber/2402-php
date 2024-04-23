// 함수 (function)
// 입력을 받아 출력을 하는 일련의 과정을 정의한 것

// 함수 선언식
// 호이스팅에 영향을 받고, 재할당이 가능
function mySum(a, b) {
    return a + b;
}
//주의: 이름 중복 안되게
function mySum(a, b) {
    console.log('재할당');
}
//부연설명: 자바스크립트에서는 함수가 객체이므로 변수에 담는게 가능함.
//밑의 방법이 가장 best이긴 함.
// 함수 표현식
// 호이스팅에 영향 받지않고, 재할당을 방지
const FNC_MY_SUM = function(a, b) {
    return a + b;    
}
//현업 많.
// 화살표 함수
const FNC_MY_SUM_2 = (a, b) => a + b;

// 파라미터가 없을 경우 (빈 소괄호를 작성 해줘야 함)
// 익명 함수를 생성하고, 이를 상수 FNC_TEST1 에 할당한다.
const FNC_TEST1 = function() {
    // 'FNC_tEST1' 문자열을 반환함.
    return 'FNC_TEST1';
}

// 화살표 함수를 사용하여 익명함수 만들고, 이를 상수 FNC_TES1_A에 할당함.
const FNC_TEST1_A = () => 'FNC_TEST1';

// 파라미터가 1개일 경우 소괄호 생략 가능
//익명 함수 생성 -> 좌측 FNC_TEST2에 할당.
const FNC_TEST2 = function(str) {
    // 매개변수로 전달된 str 값을 반환함.
    return str;
}
// 화살표 함수를 사용해 익명함수 생성 -> 상수 FCN_TEST2_A에 할당함.
const FNC_TEST2_A = (str) => str;

// 리턴처리 이외의 처리가 있을 경우
const FNC_TEST3 = function(str) {
    if(str === 'a') {
        str = 'a입니다';
    }
    return str;
}
// 중괄호 필수!
const FNC_TEST3_A = str => {
    if(str === 'a') {
        str = 'a입니다';
    }
    return str;
}

// 콜백 함수
// 다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
//MY_SUB라는 화살표 함수를 정의한다. 이 함수는 callBack과 num이라는 매개변수를 받는다.
//calBack -> 함수를 전달받는 매개변수, num -> 숫자를 전달받는 매개변수
const MY_SUB = (callBack, num) => {
    if(num === 3) {
        return '3입니다.';
    }
    return callBack() - num;
}
// MY_CALLBACK이라는 화살표 함수 정의한다. 이 함수는 매개변수 받지X, 항상 10을 반환한다.
const MY_CALLBACK = () => 10; 

// MY_SUB 함수 호출, 이 때
MY_SUB(MY_CALLBACK, 3);

// 즉시 실행 함수(IIFE)
// 함수의 정의와 동시에 바로 호출되는 함수
// 딱 한번만 호출 ㄱㄴ,재 불가
// 모듈화, 스코프 보호, 클로저 형성

//일단 이부분은 이런게 있다 정도. ->
// 즉시 실행되는 익명 함수 정의
const MY_CLASS = (function() {
    // 함수 내부에서만 접근할 수 있는 지역변수 name 선언 -> '홍길동'으로 초기화.
    const name = '홍길동';
    // 객체를 반환함.
    return {
        // 객체의 속성으로 myPrint라는 함수 정의함.
        myPrint: function() {
            //함수 내부에서 정의된 name 변수에 접근하여 '홍길동입니다.'라는 문자열 출력함.
            console.log(name + '입니다.');
        }
    }
});












