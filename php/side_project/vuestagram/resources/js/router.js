import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import JoinComponent from '../components/JoinComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import store from './store';





// chkAuth 함수 -> 경로 이동 전에 호출되는 네비게이션 가드입니다.
function chkAuth(to, from, next) {
    // store의 상태인 authFlg가 false(인증되지 않음)인 경우를 확인합니다.
    if(!store.state.authFlg) {
        // 인증x ->  사용자를 로그인 페이지로 리디렉션합니다.
        next('/login');
    }
    // 인증 완 -> 다음으로 진행
    next();
}

// function chkAuthReturn(to, from, next) {
    //     if(to.path === '/login' && store.state.authFlg) {
        //         if(from.path === '/') {
            //             next('/board');
//         }
//         next(from.path);
//     }
//     next();
// }

function chkAuthReturn(to, from, next) {
    if ((to.path === '/login' || to.path === '/join') && store.state.authFlg) {
        if (from.path === '/') {
            next('/board');
        } else {
            next(from.path);
        }
    } else {
        next();
    }
}

const routes = [
    {
        path: '/',
        redirect: '/login',
    },
    {
        path: '/login',
        component: LoginComponent,
        boforeEnter: chkAuthReturn, 
    },
    {
        path: '/join',
        component: JoinComponent,
        // 확인 필요: chkAuthReturn인지, chkAuth인지  
        boforeEnter: chkAuthReturn, 
    },
    {
        path: '/Board',
        component: BoardComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/create',
        component: BoardCreateComponent,
        // chkAuth -> 권한체크
        beforeEnter: chkAuth,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes, 
});

export default router;
