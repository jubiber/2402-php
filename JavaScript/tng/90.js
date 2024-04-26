

function myAxiosGet() {
    const URL = document.querySelector('#input-url').value;

    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);
        
    })
        .catch(error => console.log(error));
}

function myMakeImg(data) {
    data.forEach(item => {
        const CONTAINER = document.querySelector('.img-container');
        // 이미지를 감싸는 div 요소 생성
        const imageDiv = document.createElement('div');
        imageDiv.style.width = '120px';
        imageDiv.style.height = '130px';
        imageDiv.style.backgroundColor = 'gray';
        imageDiv.style.display = 'inline-block';
        imageDiv.style.position = 'relative';
        imageDiv.style.margin = '10px';

        // const NUM = document.querySelector('.number');
        const numberText = document.createTextNode(item.id);
        
        const numberDiv = document.createElement('div');
        numberDiv.textContent = item.id;
        numberDiv.style.position = 'absolute'; // 절대적인 위치 지정
        numberDiv.style.top = '10px'; // 위에서부터 5px 위치
        numberDiv.style.left = '50px'; // 왼쪽에서부터 5px 위치
    
        

        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('id', item.id);
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style.width = '100px'; 
        ADD_IMG.style.height = '80px';
        ADD_IMG.style.position = 'relative';
        ADD_IMG.style.top = '40px';


    

        // 이미지를 감싸는 div 요소에 이미지와 숫자 추가
        imageDiv.appendChild(ADD_IMG);
        CONTAINER.appendChild(imageDiv);
        // imageDiv.appendChild(numberText);
        imageDiv.appendChild(numberDiv);
        // CONTAINER.appendChild(NUM);
 

        console.log('img id', ADD_IMG.getAttribute('id'));
    });
}

const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);


// 3. 지우는거
function removeElement() {
    const elementToRemove = document.querySelector('.img-container');
    elementToRemove.remove(); // 요소 제거
}

const removeButton = document.querySelector('#remove');
removeButton.addEventListener('click', removeElement);
// #remove 버튼 누르면 .img-container 지워짐
// const BTN_REMOVE = document.querySelector('#remove');

// function removeClickListener() {
//     BTN_API.removeEventListener('click', myAxiosGet);
// }

// BTN_REMOVE.addEventListener('click', removeClickListener);


// BTN_REMOVE.removeAttribute('click', () => {
//     clearInterval();
// })