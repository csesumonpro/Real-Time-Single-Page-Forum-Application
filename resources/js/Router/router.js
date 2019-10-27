import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from "../components/Login/Login";
import Logout from "../components/Login/Logout";
import Signup from "../components/Login/Signup";
import Forum from "../components/forum/Forum";
import Toolbar from "../components/Toolbar";
import SingleQuestion from "../components/forum/SingleQuestion";
import Ask from "../components/forum/Ask";


const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum},
    { path: '/toolbar', component: Toolbar},
    { path: '/question/:slug', component: SingleQuestion},
    { path: '/ask', component: Ask},

]




const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history',

})

export default router;
