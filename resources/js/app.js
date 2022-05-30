require('./bootstrap');

import { createApp } from 'vue';

import App from './components/App.vue';

import router from './router';


const app = createApp({});

app.use(router);

app.mount('#app');

//createApp(App).use(router).mount("#app");
