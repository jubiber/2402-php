require('./bootstrap');

// vue 생성 시 추가
import { createApp } from 'vue';
import AppComponent from '../components/AppComponent.vue';

createApp({
    components: {
        AppComponent,
    }
}).mount('#app');

