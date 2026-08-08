import { createRouter, createWebHistory } from "vue-router";
import adminRouter from './admin';

const routes = [...adminRouter];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;