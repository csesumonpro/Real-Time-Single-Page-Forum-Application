import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    // { path: '/foo', component: Foo },
]
const router = new VueRouter({
    routes // short for `routes: routes`
})

export default router;
