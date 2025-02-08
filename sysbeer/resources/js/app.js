import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue';
import router from './router';

const app = createApp(App);

// Usa o Pinia para gerenciamento de estado
app.use(createPinia());

// Usa o Vue Router para navegação
app.use(router);

app.mount('#app');
