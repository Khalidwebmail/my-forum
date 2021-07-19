import Vue from 'vue'
import VueRouter from 'vue-router'
import LoginComponent from "./components/auth/LoginComponent";

Vue.use(VueRouter)

const routes = [
    { path: '/login', component: LoginComponent, name: '/login' }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
