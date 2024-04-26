// Axios
// Axios를 사용하여 주어진 URL 에서 GET 요청을 보냄
// axios.get('https://picsum.photos/v2/list?page=2&limit=5')
// // 요청이 성공한 경우
// .then(response => {
//     // 응답 객체를 콘솔에 출력
//     console.log(response);
//     //응답 데이터를 콘솔에 출력
//     console.log(response.data);
// })
// // 요청 실패
// .catch(err => console.log(err))
// // 성공 or 실패 상관x 마지막으로 실행되는 동작
// .finally(() => console.log('파이널리'))
// ;

// 변수 test 선언
let test; 
function myAxiosGet() {
    // URL 요소 가져오기
    const URL = document.querySelector('#input-url').value;

    // Axios 사용하여 get 요청 보내기
    axios.get(URL)
    // 성공 ( myAxistGet함수 URL 기반으로 Axios를 사용하여 GET요청 보내고 성공적 응답 받으면)
    // response.date에서 데이터 추출하여 이미지 생성하는 myMakeIng 함수 호출
    .then(response => {
        // 실제 필요한 데이터가 response.data에 있음
        // 가져온 데이터를 이용하여 이미지 생성
        myMakeImg(response.data);
    })
    // 실패 -> 콘솔에 에러 출력
    .catch(error => console.log(error));
}

// 사진 데이터를 화면에 추가하는 함수
// my data 안에는 배열  5개가 들어있음
function myMakeImg(data) {

    data.forEach(item => {
        // 부모요소 접근
        const CONTAINER = document.querySelector('.img-container');

        // img 태그 생성
        const ADD_IMG = document.createElement('img');
        // ADD_IMG 라는 변수에 접근하여 setAttribute 메서드를 호출하고있다.
        // HTML 속성을 변경하는 데 사용됨.
        // setAttribute 메서드(변경할 속성 이름, 해당 속성에 할당할 값)
        ADD_IMG.setAttribute('src', item.download_url)
        ADD_IMG.style.width = '200px';
        ADD_IMG.style.height = '200px';
        
        // 이미지 화면에 추가
        CONTAINER.appendChild(ADD_IMG);
    });
}

const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);









