// 문제1. 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
result = ARR1.sort((a, b) => a - b);
console.log(ARR1);
//박T
const ARR7 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
let copyArr = [...ARR1];
copyArr.sort((a, b) => a - b);
console.log(copyArr);
// 문제2. 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
// const ARR2 = [5, 7, 3, 4, 5, 1, 2];

//방법1 (나 + 박T 참고)
const ARR3 = [5, 7, 3, 4, 5, 1, 2];
//짝수(even)
const EVEN = ARR3.filter(val => val % 2 === 0);
//홀수(odd)
// 2 !== 0 
const ODD = ARR3.filter(val => val %2 === 1);
console.log(EVEN,ODD);

//방법2 (박T)
const EVEN2 = [];
const ODD2 = [];
ARR2.forEach(num => {
    if(num % 2 === 0) {
        EVEN2[EVEN2.length] = num;
    } else {
            ODD2[ODD2.length] = num;
    }
});
    console.log(EVEN2, ODD2);
//방법3 (구글)
// 변수 a에는 숫자 24 할당
let a = 24;
// 변수 b에는 숫자 17 할당
let b = 17;
//checkEvenNumber 함수 정의. 짝수or홀수 확인
    function chekEvenNumber(num) {
        // 주어진 숫자를 2로 나눈 나머지 계산하여 remainder 변수에 할당
        let remainder = num % 2;
        if(remainder === 0) {
            return true;
        }
        return false;
        }

    const ARR2 = [5, 7, 3, 4, 5, 1, 2];
    let oddARR2 = [];
    let evenARR2 = [];
    ARR2.forEach(element => {
        if(chekEvenNumber(element)) {
            evenARR2.push(element);
        }
        else {
            oddARR2.push(element);
        }
    })

    // print the protram result in console
    console.log(evenARR2);
    console,log(oddARR2);







// result = ARR2.filter(val => val % 2 === 0);
//splice(자르)
//
