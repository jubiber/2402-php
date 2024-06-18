<template>
    <div class="form-box">
     <p class="form-title">회원가입</p>
     <input v-model="userInfo.name" type="name" name="name" placeholder="이름">
     <input v-model="userInfo.email" type="email" name="email" placeholder="이메일">
     <span>
        <button @click="checkDuplicate" class="btn btn-success float-end">중복확인</button>
        <p v-if="duplicateMessage">{{ duplicateMessage }}</p>
     </span>
     <input v-model="userInfo.account" type="text" name="account" placeholder="아이디">
        <!-- 중복확인 결과를 표시할 메시지 -->
        <!-- <p v-if="duplicateMessage">{{ duplicateMessage }}</p> -->
     <input v-model="userInfo.password" type="password" name="password" placeholder="비밀번호">
     <input v-model="userInfo.password_chk" type="password_chk" name="password_chk" placeholder="비밀번호 확인">
     <div class="form-group">
            <label>
                <input type="radio" v-model="userInfo.gender" value="0" name="gender"> 남자
            </label>
            <label>
                <input type="radio" v-model="userInfo.gender" value="1" name="gender"> 여자
            </label>
        </div>
    <span>
        <button  id="my-btn-complete" type="submit"  disabled="disabled" @click="$store.dispatch('join', userInfo)" class="btn btn-submit btn-bg-black"> 완료 </button>
        <a href="{{ route('login') }}" class="btn btn-secondary float-end">취소</a>
    </span>
    
    </div>
</template>

<script>
import { reactive } from 'vue';
import axios from 'axios';

export default {
    // 이메일 중복체크
    setup() {
        const userInfo = reactive({
            name: '',
            email: '', // userInfo 객체에 email 속성을 추가합니다.
            account: '',
            password: '',
            password_chk: ''
    });
    const duplicateMessage = reactive({ value: '' }); // duplicateMessage를 reactive 객체로 정의합니다.
    

    const checkDuplicate = () => {
        
        // 중복 확인이 실패하면 에러 메시지를 할당하거나, 사용 가능한 아이디라는 메시지를 표시합니다.
        // 클라이언트에서 이메일 값을 서버로 전송하여 중복 여부 확인
        axios.post('/api/check-email', { email: userInfo.email })
        // 여기에 중복 확인 로직을 구현합니다.
        // 중복 확인이 성공하면 duplicateMessage에 메시지를 할당합니다.
            .then(response => {
                if (response.data.exists) {
                    duplicateMessage.value = '중복된 이메일입니다.';
                } else {
                    duplicateMessage.value = '사용 가능한 이메일입니다.';
                }
            })
            .catch(error => {
                console.error(error);
                duplicateMessage.value = '중복 확인 중 오류가 발생했습니다.';
            });
    };

        const join = () => {
            // 회원가입 로직
        };
        return {
            userInfo,
            duplicateMessage,
            checkDuplicate,
            join
        };
    }
};
</script>

<style>
.btn-yellow {
    background-color: rgb(255, 219, 239);
    font-family: 'DM Sans', sans-serif;
    font-weight: 400;
    color: rgb(255, 255, 255);
    
}

#my-btn-complete {
    width: 50px; /* 너비를 원하는 크기로 조절하세요 */
    height: 40px; /* 높이를 원하는 크기로 조절하세요 */
}

/* 취소 버튼 크기 조절 */
.btn-secondary {
    width: 80px; /* 너비를 원하는 크기로 조절하세요 */
    height: 40px; /* 높이를 원하는 크기로 조절하세요 */
}
</style>