require('./bootstrap');

import { createApp } from 'vue';
import store from '../js/store';
import router from '../js/router';
import AppComponent from '../components/AppComponent.vue';


createApp({
    components: {
        AppComponent,
    }
})
.use(store)
.use(router)
.mount('#app');
