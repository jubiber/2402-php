//앞전: 배열 -> 중요
//동적 배열 (늘 줄 가능)
//희소배열

// 배열
const ARR = [1, 2, 3, 4, 5];

console.log(ARR[2]);
ARR[5] = 6;
//자료구조론 책 참고하셈. or 정처기 이론.

//배열의 길이 획득
console.log(ARR.length);
ARR[ARR.length] = 7;

// 배열 여부 체크
console.log(Array.isArray(ARR));
console.log(Array.isArray(1));

// indexOf(): 배열에서 특정 요소를 검색해 해당 인덱스를 획득
let arr = ['몸무','그로밋','비버'];
arr.indexOf('비버');
if(arr.indexOf('갑돌이') < 0) {
    //처리
} 

// includes():  배열에서 특정 요소의 존재 여부를 체크, 리턴 boolean
//인클루드 직관적이고 편함 (차이 메모할 것!)
arr.includes('몸무');
if(!(arr.includes('몸무'))) {
    //처리
}

// push() : 원본 배열의 마지막 요소를 추가, 리턴은 변경된 length 길이 반환
//여러개 값 보내기 가능. (느림)
arr = ['몸무','그로밋','비버'];
let len = arr.push('반장님');
arr.push('나미리','둘리'); //파라미터를 복수 설정해서 여러 값을 한 번에 추가하기 쉬움

// 배열복사
arr = ['몸무','그로밋','비버'];
arr2 = [...arr]; //Spread Operator
arr2.push('반장님');

// pop() : 원본 배열의 마지막 요소를 제거, 제거된 요소의 값 반환
arr = ['대파','고구마','감자'];
let result = arr.pop();
console.log(arr);

// unshift() : 원본 배열의 첫번째 요소를 추가, 변경된 length 반환
arr = ['대파','고구마','감자'];
result = arr.unshift('둘리');
console.log(result.arr);

// shift() : 원본 배열의 첫번째 요소를 제거, 제거된 요소의 값 반환
reault = arr.shift();
console.log(result.arr);

// splice(start, count, ...args) : 요소를 잘라서 자른 배열을 반환
//콘솔에 arr.splice(2)라고 치면 배열 3,4,5가 나오고 arr 찍으면 1,2나옴
arr = [1, 2, 3, 4, 5];
result= arr.splice(2);
console.log(arr); // [1, 2]
console.log(result); //[3, 4, 5]

arr = [1, 2, 3, 4, 5];
result= arr.splice(-2);
console.log(arr); // [1, 2, 3]
console.log(result); // [4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100, 200, 300);
console.log(arr); // [1, 200, 200, 300, 4, 5]
console.log(result); // [2, 3]

// 삭제 안하고 여러개 값 추가 하는법
arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 0, 100, 200);
console.log(arr); // [1, 2, 100, 200, 3, 4, 5]
console.log(result); // []

// join() : 배열의 요소를 구분자로 연결한 문자열을 만들어서 반환
// 구분문자는 디폴트가 ','
arr = [1, 2, 3, 4];
result = arr.join('a');

console.log(result);

//이부분 어려움 영상 참고하셈.
// sort() : 배열의 요소를 문자열로 변환 후 오른차순 정렬 하고, 정렬된 배열을 반환
// 원본변경
// (a - b)가 양수일 경우, a가 큰수, b가 작은수로 인식하여 정렬
// (a - b)가 음수일 경우, a가 작은수, b가 큰수로 인식하여 정렬
// (a - b)가 0일 경우, 같은 값으로 인식하여 정렬하지 않음
arr = [4, 3, 6, 1, 2, 5, 10];
// a - b는 오른 b - a는 내림
//화살표 함수 간단. 이걸로 쓰셍
result = arr.sort((a, b) => a - b); //숫자 오름차순 정렬 
// result = arr.sort((a, b) => b - a); //숫자 내림차순 정렬 걍 외우셍
console.log(arr);
console.log(result);

// map() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새로운 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소의 값 * 2를 한 결과를 얻고 싶다.
// [2, 4, 6, 8 ...., 20]

let copyArr = [];
for(let val of arr) {
    copyArr[copyArr.length] = val * 2;
}

let mapArr = arr.map(val => val * 2); 

// som() : 배열의 모든요소에 대해서 콜백함수를 반복 실행하고, 조건에 만족하는 결과가 
// 조건에 만족하는 결과가 하나라도 있다면 true, 만족하는 결과가 하나도 없으면 false
//or과 유사
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

result = arr.some(val => val === 11);

// every() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false
//and와 유사
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// result = arr.every(val => val === 5); // 콘솔 false
result = arr.every(val => val >=1); // 콘솔 true

// filter() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 맞는 요소만 모아서 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 3의 배수만 가져오셍
result = arr.filter(val => val % 3 === 0); // [3, 6, 9]

// foreach() : 배열의 모든요소에 대해서 콜백 함수를 반복 실행
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
//value(값) index 둘다 접근 가능함.
arr.forEach((val, key) => console.log(`key : ${key}, val : ${val}`));

//->여기페이지만 다 알고있어도 현업 문제 무.


 




































