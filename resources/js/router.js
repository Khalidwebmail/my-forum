import Vue from 'vue'
import VueRouter from 'vue-router'
import LoginComponent from "./components/auth/LoginComponent";
import SignupComponent from "./components/auth/SignupComponent";
import ForumComponent from "./components/forum/ForumComponent";

Vue.use(VueRouter)

const routes = [
    { path: '/login', component: LoginComponent, name: '/login' },
    { path: '/signup', component: SignupComponent, name: '/signup' },
    { path: '/forum', component: ForumComponent, name: '/forum' },
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
