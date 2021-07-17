import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

//Main
import Registration from "./components/main/registration";


const routes = [
    {
        path: '/',
        redirect: { name: 'sregistration' }
    },
    {
        path: "/register",
        name: "sregistration",
        component: Registration,
    }
];

const router = new VueRouter({
    mode: "hash",
    routes
});


export default router;
