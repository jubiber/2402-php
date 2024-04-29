// API 호출 버튼 이벤트
const btnAPI = document.querySelector('btn-api');
btnAPI.addEventListener('click', myGetData);

// API 호출
//saync/await로 작성하는 방법
async function myGetData() {
    // url 획득
    const url = document.querySelector('#input-url').value;

    // API 요청
    try {
        const response = await axios.get(url);
        myMakeItem(response.data);
    }
    catch (error) {
        console.log(error);
    }
}
// 체이닝 기법
// 위와 같은 방법으로 해도 똑같이 실행됨. 
//     //엑시오스로 요청하면 덴으로 전달 ㅇㅇ
//     myAxios.get(url)
//     .then(response => {
//         console.log(response);
//         myMakeItem(response.data);
//     })
//     .catch(err => console.log(err));
// }

function myMakeItem(data) {
    data.forEach(item => {
        // 아이템을 추가할 부모요소 획득
        const main = document.querySelector('.main');

        // 아이템 생성
        const newArticle = document.createElement('div');
        const newArticId = document.createElement('div');
        const newImg = document.createElement('img');
 
        // 아이템 data setting
        newArticle.classList = 'article';
        newArticId.classList = 'div-article-id';
        newImg.classList = 'div-article-img';
        newArticleId.textContent = item.id;
        newImg.src = item.download_url;

        // 생성한 요소 결합
        newArticle.appendChild(newArticleId); // 아티클에 아티클id 추가
        newArticle.appendChild(newImg); // 아티클에 이미지 추가
        main.appendChild(newArticle); // 메인에 아티클 추가
    });
}

// 아이템 지우기
const btnMain = document.querySelector('#btn-clear');
btnMain.addEventListener('click', () => {
    // main.innerHTML = '';

    // 최대 5개까지씩 지우기
    const main = document.querySelector('.main');
    const articleList = document.querySelectorAll('.article');
    
    for(let i = 0; i < 5; i++) {
        let idx = articleList.length - 1 - i; // index 계산
        if(idx < 0) {
            // index가 0보다 작으면 루프 종료
            break;
        }
       main.removeChild(articleList[idx]); // 해당 아티클 삭제
    }
});



