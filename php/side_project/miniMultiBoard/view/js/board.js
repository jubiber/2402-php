document.querySelectorAll(".my-btn-detail").forEach(item => {
    // 이벤트리스너 -> 하나씩!
    item.addEventListener('click', () => {
        const url = '/board/detail?b_id=' + item.value;

        axios.get(url)
        .then(responese => {
            // 서버로부터 받은 데이터 중 첫 번쨰 요소 선택하여
            // 'data' 변수에 할당한다는 의미임. 
            // 이후 'data'변수를 통해 해당 데이터에 접근하여 필요한 작업 수행할 수o
            const data = responese.data[0];

            const btnDelete = document.querySelector('#my-btn-delete'); // 삭제 버튼
            const modalTitle = document.querySelector('.modal-title'); // 제목
            const modalContent = document.querySelector('.modal-body > p'); // 내용 노드
            const modalImg = document.querySelector('.modal-body > img'); // 이미지 노드

            // 상세 정보 셋팅
            
            modalTitle.textContent = data.b_title;
            modalContent.textContent = data.b_content;
            modalImg.src = data.b_img;
            // console.log(response.data);
            
            //빈도 높 먼저쓰셍 (동작문제는x)
            if(data.login_u_id !== data.u_id) {
                btnDelete.classList.add('d-none');
                btnDelete.value = '';
            } else {
                btnDelete.classList.remove('d-none');
                btnDelete.value = data.b_id;
            }
        })
        .catch(err => console.log(err));     
    });
});

// 삭제 처리 (async)
document.querySelector('#my-btn-delete').addEventListener('click', myDeleteCard);

async function myDeleteCard(e) {
    console.log(e.target.value);

    const url = '/board/delete'; // url 설정

    const data = new FormData(); // from 생성
    data.append('b_id', e.target.value); // b_id 셋팅
    try { 
        const responese = await axios.post(url, data);
        // response.data = ['errorFlg' : false, 'errorMsg': '', 'b_id' : 16];

        if(responese.data.errorFlg) {
            // 에러일 경우
            alert('삭제 실패 했습니다.');
        } else {
            // if 정상
            const main = document.querySelector('main'); //  부모 요소
            const card = document.querySelector('#card' + responese.data.b_id); // 삭제할 요소
            main.removeChild(card);

        }
    } catch(error) {
        console.log(error);
    }
}



