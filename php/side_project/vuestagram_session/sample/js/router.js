import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';


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
        },
        {
            path: '/board/create',
            component: BoardCreateComponent,
        },
        {
            path: '/registration',
            component: RegistrationComponent,
        },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
