import Vue from 'vue'
import VueRouter from 'vue-router'
import LoginComponent from "./components/auth/LoginComponent";
import SIgnupComponent from "./components/auth/SignupComponent";

Vue.use(VueRouter)

const routes = [
    { path: '/login', component: LoginComponent, name: '/login' },
    { path: '/signup', component: SIgnupComponent, name: '/signup' }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
