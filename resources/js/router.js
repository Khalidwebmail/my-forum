import Vue from 'vue'
import VueRouter from 'vue-router'
import LoginComponent from "./components/auth/LoginComponent";
import SignupComponent from "./components/auth/SignupComponent";
import ForumComponent from "./components/forum/ForumComponent";
import LogoutComponent from "./components/auth/LogoutComponent";
import ReadComponent from "./components/forum/ReadComponent";
import CreateQuestionComponent from "./components/forum/CreateQuestionComponent";


Vue.use(VueRouter)

const routes = [
    { path: '/login', component: LoginComponent, name: '/login' },
    { path: '/signup', component: SignupComponent, name: '/signup' },
    { path: '/forum', component: ForumComponent, name: '/forum' },
    { path: '/logout', component: LogoutComponent, name: '/logout' },
    { path: '/question/:slug', component: ReadComponent, name: '/read' },
    { path: '/question-create', component: CreateQuestionComponent, name: '/question-create' },
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
