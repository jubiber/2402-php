// String 객체

//문자열 -> 객체
let str = '123456678';
// 인스턴스 -> new 필요
let str2 = new String('d d');

// length : 문자열의 길이를 반환
console.log(str.length);

// 캐릭터 에이티 charAt() : 특정 인덱스의 문자를 반환
str.charAt(3);

// indexOf() : 문자열에서 특정 문자열을 찾아 최초의 인덱스를 반환
// 없는 문자는 -1 반환.

str = '안녕하세요. 안녕하세요.';
str.indexOf('녕');
if(str.indexOf('안녕') < 0) {
    console.log('해당 문자열 없음');
}
// 검색을 시작할 인덱스 위치 지정 하는 방법
str.indexOf('녕', 5);

// includes() : 문자열에서 특정 문자열을 찾아 true/false 반환
if(str.includes('하세요')) {
    console.log('검색 문자열 존재');
}

// replace() : 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환함.
str = 'abcdefg dede';
// 제일 처음 검색된 부분만 바뀜. 뒤 dede에는 적용x
str.replace('de', '안녕');

// replaceAll() : 모든 특정 문자열을 찾아서 지정한 문자열을 치환한 문자열을 반환
//위와 다르게 모든 de가 다 안녕으로 바뀜.
str.replaceAll('de', '안녕');

// substring() : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
str = '안녕하세요. JavaScript입니다.';

// 7부터 16까지 추출하는거
str.substring(7, 17); // 콘솔 JavaScript
// 이거 쓰면 안댐
// str.substr();
//현업 코딩스타일
// '입니다'라는 문자열을 패턴으로 지정함.
let pattern = '입니다';
// 문자열 str에서 '입니다'라는 패턴의 첫 번째 등장 위치를 찾습니다.
let patternIndex = str.indexOf(pattern);
// patternIndex 변수에는 10이 저장됨.
//추출
str.substring(patternIndex, patternIndex + pattern.length);

// split() : separator를 기준으로 문자열을 잘라서 배열 요소를 담은 배열을 반환
str = '빵, 돼지숯불, 제육, 돈까스';
str.split(', '); // 출력: ['빵', '돼지숯불', '제육', '돈까스']
// 배열길이를 2로 제한
str.split(', ', 2); // 출력: ['빵', '돼지숯불']

// trim() : 좌우의 공백을 제거해서 문자열 반환
//미리 트림으로 공백 제거 후 이용하는 경우 많음
str = '   sdadhaf    ';
str.trim(); // 출력: '빵, 돼지숯불, 제육, 돈까스'

// toUpperCase(), toLowerCase() : 알파벳을 대/소문자로 변환해서 반환
str = ' aBcD';
str.toUpperCase(); // 출력: 'ABCD'
str.toLowerCase(); // 출력: 'abcd'

//실습  + 동적화면(php랑 연동)
//자바스크립트에서 만들고픈 기능 정리해보기
//간단 -> 제작(박T 쉅) -> 응용












