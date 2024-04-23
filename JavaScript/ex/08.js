//--------------------
//  조건문 ( if, switch)
// -------------------

// 1이면 1등, 2-2 3-3 나머지는 순위 외, 5번만 특별상 출력
let num1 = 3;

if (num1 === 1) {
    console.log("1등");
}
else if(num1 === 2) {
    console.log("2등");
}
else if(num1 === 3) {
    console.log("3등");
}
else {
    if(num1 === 5){
        console.log("특별상");
    }
    else{
        console.log("순위 외");
    }
}

// 나이 20대면 '20대', 30대면 '30대', 나머지는 '모르겠다'
//범위 체크에 적절하지 않음.
let age = 20;
switch( age ) {
    case 20:
        console.log("20대");
        break;
    case 30:
        console.log("30대");
        break;
    default:
        console.log("모르겠다");
        break;
}



//------------------
// 반복문 ( for, while, do_while)
//------------------
// i * 2로 하면 무한루프 돔.(1이 반복)
for(let i = 1; i < 11; i++) {
    if(i % 3 === 0) {
        continue;
    }
    console.log(i + '번째 루프');

    if(i === 7) {
        break;
    }
}
//for문 많이 쓰면 댈 듯 개발자마다 다름 ㅇㅇ
let cnt = 1;
while(cnt <= 10) {
    if(cnt % 3 === 0) {
        cnt++;
        continue;
    } 
    console.log(cnt + '번째 루프');

    if(cnt === 7) {
        break;
    }
    cnt++;
}

// 구구단 2~9단 출력
// 예시
// ** 2단 **
// 2 x 1 = 1
// ...
// 9 x 9 = 81

let num = 1;
for(let num = 2; num < 10; num++) {
    console.log("** " + num + "단"+ " **")
    for(let num2=1; num2 <10; num2++) {
        console.log(num + " X " + num2 + " = " + num*num2)
    }
}
// 박T
const DAN = 9;
for(let dan = 2; dan <= DAN; dan++) {
    console.log(`** ${dan}단 **`);
    for(let multi = 1; multi <= DAN; multi++) {
        console.log(`${dan} X ${multi} = ${dan * multi} `);
        //console.log(dan + " X " + multi + " = " + (dan*multi));
    }
}
// for...in
// 모든 객체를 반복하는 문법
// key에만 접근이 가능
//기억 ㄱ
const OBJ = {
    key1: 'val1'
    ,key2: 'val2'
};

for(let key in OBJ) {
    console.log(OBJ[key]);
}

const ARR1 = [1, 2, 3];
for(let key in ARR1) {
    console.log(ARR1[key]);
}

// for...of
// iterable 객체(순서가 정해져있음)를 반복하는 문법 (String, Array, Map, set, TypeArray..)
// value에만 접근이 가능
const STR1 = '안녕하세요'; 
for(let val of STR1) {
    console.log(val);
}










