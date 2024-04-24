// 돔 중요 (세세 연습 필요)


// 요소선택
// ----------------
// 고유한 ID로 요소를 선택
// HTML 문서 내에서 'id'가 'title'인 요소를 선택하여 'TITLE'이라는 상수에 할당함.
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue';

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');
// H1[1].style.color = 'green';
H1[1].style = 'color: green; font-size: 3rem;';

// 클래스 요소를 선택
const CLASS_ELE = document.getElementsByClassName('none-li');

//기억!!!!!
// CSS 선택자를 이용해서 요소를 선택
// 현업에서 많 사용 (쿼리셀렉터) -> id class로 가져오기 ㄱㄴ 태그명도
const CSS_ID = document.querySelector('#title');
// 가장 상단 하나만 가져옴
const CSS_CLS = document.querySelector('.none-li');
// 여러개 가져올 수 있음
const CSS_CLS_ALL = document.querySelectorAll('.none-li');

// 문제: html의 지뢰찾기를 가져와보셍.

const SECOND_CHILD = document.querySelector('#ul > li:nth-child(2)');
// 문제: CSS_CLS_ALL에 획득한 모든 요소 글자색 변경

// 부연설명: 'node'라는 매개변수를 받아 해당 요소의 'style' 속성에 접근하고 'color' 속성을 'red'로 설정함
// [0] = li [1] = li 스타일 요소 각각 주고 [7] = li 까지 red 적용하면 끗.
CSS_CLS_ALL.forEach(node => node.style.color = 'red');
//밑에 걸 축약한게 위의 화살표 함수임
// CSS_CLS_ALL.forEach(function(node) {
//     node.style.color = 'red';
// });

// ---------------
// 요소 조작
// ---------------
// textContent: 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달
 TITLE.textContent = '<a>링크</a>';

// // innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
 TITLE.innerHTML = '<a>링크</a>';
// 왜 반대로 뜨지??

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder', '값값값');
INPUT1.setAttribute('name', 'input1');


// removeAttribure(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');

// -----------
// 요소 스타일링
// -----------
// style : 인라인으로 스타일 추가 
TITLE.style.color = 'blue';
TITLE.removeAttribute('style');
// classList : 클래스로 스타일을 추가 및 삭제
// add() : 추가
TITLE.classList.add('font-color-red'); // 1개 추가
TITLE.classList.add('font-color-red', 'css2', 'css3', 'css4', 'css5'); // 여러개 추가

// classList,remove() : 제거
TITLE.classList.remove('font-color-red');

// classList.toggle() : 해당 클래스를 토글(나타났,없어졌 하는거)



// 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정


const li = document.getElementsByTagName('li');
//홀수
// li[1].style = 'color: blue;';
// li[3].style = 'color: blue;';
// li[5].style = 'color: blue;';
// li[7].style = 'color: blue;';
// li[9].style = 'color: blue;';

// -> 줄여보면
for (let i=0; i<li.length; i +=2) {
    li[i].style.color = 'blue';
}
//짝수
// li[0].style = 'color: red;';
// li[2].style = 'color: red;';
// li[4].style = 'color: red;';
// li[6].style = 'color: red;';

// -> 줄여보면
for(let j=1; j<li.length; j+=2) {
    li[j].style.color = 'red';
}


// 참고>
// 태그명으로 요소를 선택하는 방법
// const H1 = document.getElementsByTagName('h1');
// // H1[1].style.color = 'green';
// H1[1].style = 'color: green; font-size: 3rem;';

// 박T
//삼항연산자 말고 if도 ㄱㄴ
const items = document.querySelectorAll('#ul > li');
items.forEach((item, key) => (item.style.color = key % 2 === 0 ? 'red' : 'blue'));


//추가안됨 why??
// ------------
//새로운 요소 생성
// ------------
// createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.innerHTML = '광산게임';

const TARGET = document.querySelector('#ul'); // 삽입할 부모요소 선택

// appendChild(노드) : 해당 부모 노드에 마지막 자식으로 노드 추가
TARGET.appendChild(NEW_LI);

// // 동일한 형태 요소 여러개 추가방법
// for(let i = 0; i < 3; i++) {
//     const NEW_LI = document.createElement('li');
// NEW_LI.innerHTML = '광산게임';

// const TARGET = document.querySelector('#ul'); // 삽입할 부모요소 선택

// // appendChild(노드) : 해당 부모 노드에 마지막 자식으로 노드 추가
// TARGET.appendChild(NEW_LI);
// }

// insertBefore(새로운노드, 기준노드) : 해당 부모 노드의 자식인 특정 기준노드 앞에 새로운 노드 추가
// ex) 지뢰찾기와 스페이스 사이에 노드추가
const NEW_LI2 = document.createElement('li');
NEW_LI2.innerHTML = '굴착소년쿵야';

const hyeunSoo = document.querySelector('#ul > li:nth-child(3)');

TARGET.insertBefore(NEW_LI2, hyeunSoo);

// 프리셀을 스페이스랑 사과게임 사이에 추가
const NEW_LI3 = document.createElement('li');
NEW_LI3.innerHTML = '프리셀';

const ABC = document.querySelector('#ul > li:nth-child(4)');

TARGET.insertBefore(NEW_LI3, ABC);

// 박T
const NEW_LI4 = document.createElement('li');
NEW_LI4.innerHEML = '프리셀';
const APPLE = document.querySelector('#apple');
TARGET.insertBefore(NEW_LI4, APPLE);

// removeChild() : 해당 부모 노드의 자식을 삭제
TARGET.removeChild(NEW_LI4);












































