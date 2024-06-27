import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from './components/ExampleComponent.vue';
import LoginComponent from './components/Login.vue';
import RegisterComponent from './components/Register.vue';
import UserComponent from './components/User.vue';
import NotFound from './components/NotFound.vue';

const routes = [
    {
        path: '/',
        component: LoginComponent
    },
    {
        path: '/example',
        component: ExampleComponent
    },
    {
        path: '/register',
        component: RegisterComponent
    },
    {
        path: '/user',
        component: UserComponent
    },
    {
        path: '/:catchAll(.*)', // Catch-all route for non-existent paths
        component: NotFound
    }
];

const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router;
