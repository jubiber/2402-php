// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
result = ARR1.sort((a, b) => a - b);
// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
// const ARR2 = [5, 7, 3, 4, 5, 1, 2];

//방법1 마구 조합해서 씀 (홀수만 결과 도출.)
// result = ARR2.splice(3, 4);
// console.log(result);
// console.log(ARR2);
// let len = ARR2.push(1, 5);
// result = ARR2.sort((a, b) => a - b);
/////////////////
//홀수(odd)
// const ARR3 = [5, 7, 3, 4, 5, 1, 2];
// result = ARR3.filter(val => val %2 === 1);
// //짝수(even)
// const ARR4 = [5, 7, 3, 4, 5, 1, 2];
// result = ARR4.filter(val => val % 2 === 0);
    // if(i % 2 === 1)
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
