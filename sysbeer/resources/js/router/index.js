import { createRouter, createWebHashHistory } from "vue-router";
import ProdutoView from '../views/ProdutoView.vue';
import EmbalagemView from '../views/EmbalagemView.vue';

const routes = [
    { path: '/produtos', component: ProdutoView },
    { path: '/embalagens', component: EmbalagemView},
    { path: '/', redirect: '/produtos' },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router;