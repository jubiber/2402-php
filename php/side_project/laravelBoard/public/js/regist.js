document.querySelector('#btn-chk-email').addEventListener('click',chkEmail);

async function chkEmail() {

    try {
        const email = document.querySelector('#email').value;
        const url = '/user/chk';
    
        // form 생성
        const form = new FormData();
        form.append('email', email);
    
        // ajax
        const response = await axios.post(url, form);
        // 'url'과 'form' 데이터를 사용하여 POST 요청을 보내고 응답을 'response' 변수에 저장합니다.
      {
        // 'my-btn-complete' ID를 가진 버튼 요소를 선택하여 'btnComplete' 변수에 저장한다.
            const btnComplete = document.querySelector('#my-btn-complete');
            const printChkEmail = document.querySelector('#print-chk-email');
            // 'printChkEmail' 요소의 내용을 빈 문자열로 초기화합니다.
            printChkEmail.innerHTML = '';
            // 정상처리
            if(response.data.emailFlg) {
                // 중복 이메일
                printChkEmail.innerHTML = '사용불가';
                printChkEmail.classList = 'text-danger';
                btnComplete.setAttribute('disabled', 'disabled');
            } else {
                // 사용가능 이메일
                printChkEmail.innerHTML = '사용가능';
                printChkEmail.classList = 'text-success';
                btnComplete.removeAttribute('disabled');
            }
        
        }
    } catch (error) {
            console.log(error.response.data);
            // 이메일 체크 에러 발생
            alert('회원가입 실패');
    }
    
}