<template>
    <div class="form-box">
     <p class="form-title">회원가입</p>
     <input v-model="userInfo.name" type="name" name="name" placeholder="이름">
     <input v-model="userInfo.email" type="email" name="email" placeholder="이메일">
     <input v-model="userInfo.account" type="text" name="account" placeholder="아이디">
     <button @click="checkDuplicate" class="btn btn-yellow">중복확인</button>
        <!-- 중복확인 결과를 표시할 메시지 -->
        <p v-if="duplicateMessage">{{ duplicateMessage }}</p>
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
     <button  @click="$store.dispatch('join', userInfo)" class="btn btn-submit btn-bg-black">회원가입</button>
    </div>
</template>

<script>
import { reactive } from 'vue';

export default {
    setup() {
        const userInfo = reactive({
            account: '',
            password: '',
            password_chk: ''
        });

        let duplicateMessage = '';

        const checkDuplicate = () => {
            // 여기에 중복 확인 로직을 구현합니다.
            // 중복 확인이 성공하면 duplicateMessage에 메시지를 할당합니다.
            duplicateMessage = '사용 가능한 아이디입니다.';
            // 중복 확인이 실패하면 에러 메시지를 할당하거나, 사용 가능한 아이디라는 메시지를 표시합니다.
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
</style>