import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import store from './store';


const routes = [
		{
            path: '/',
            redirect: '/login',
        },
        {
            path: '/login', 
            component: LoginComponent,
        },
        {
            path: '/board',
            component: BoardComponent,
            beforeEnter: chkAuth,
        },
        {
            path: '/board/create',
            component: BoardCreateComponent,
            beforeEnter: chkAuth,
        },
        {
            path: '/registration',
            component: RegistrationComponent,
        },
];
// chkAuth 함수 정의: to, from, next 매개변수를 받습니다.
function chkAuth(to, from, next) {
    // store 상태에서 authFlg 값이 true인지 확인합니다.
    if(store.state.authFlg) {
        // authFlg 값이 true이면, 다음 라우트로 이동을 허용합니다.
        next();
    } else {
        alert('로그인이 필요한 서비스입니다.');
        next('/login');
    }
}

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
