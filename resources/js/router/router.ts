import { createRouter, createWebHistory } from "vue-router";

const Login = () => import("../pages/auth/Login.vue");
const Register = () => import("../pages/auth/Register.vue");
// Pages
const Home = () => import("../pages/Home.vue");
const Reservations = () => import("../pages/Reservations.vue");
const CarType = () => import("../pages/CarType.vue");
const CarInventory = () => import("../pages/CarInventory.vue");
const Availibility = () => import("../pages/Availibility.vue");

// Dashboard
const Admin = () => import("../pages/dashboards/Admin.vue");
const ProductList = () => import("../pages/dashboards/products/index.vue");
const ProductCreate = () => import("../pages/dashboards/products/create.vue");
// const participant = () => import("../dashboard/participant.vue");
// const manager = () => import("../dashboard/manager.vue");

// // Services
import UserAuth from "../services/UserAuth";

// // Types
import ResponseData from "../types/ResponseData";

// // Store
import store from "../store/store";

const routes = [
    { path: "/", component: Home, name: "home" },

    /**
     * 認証周り
     */
    {
        path: "/login",
        name: "login",
        component: Login,
        beforeEnter: [notAuthenticated],
    },
    {
        path: "/register",
        name: "register",
        component: Register,
        beforeEnter: [notAuthenticated],
    },

    { path: "/admin", component: Admin, beforeEnter: [isAuthenticated] },
    {
        path: "/admin/products",
        component: ProductList,
        beforeEnter: [isAuthenticated],
    },
    {
        path: "/admin/products/create",
        component: ProductCreate,
        beforeEnter: [isAuthenticated],
    },
    {
        path: "/reservations",
        component: Reservations,
        beforeEnter: [isAuthenticated],
    },
    { path: "/car-type", component: CarType, beforeEnter: [isAuthenticated] },
    {
        path: "/car-inventory",
        component: CarInventory,
        beforeEnter: [isAuthenticated],
    },
    {
        path: "/availibility",
        component: Availibility,
        beforeEnter: [isAuthenticated],
    },
    // { path: '/participant-dashboard', component: participant, beforeEnter: [isAuthenticated] },
    // { path: '/manager-dashboard', component: manager, beforeEnter: [isAuthenticated] }
];

function isAuthenticated(to: any, from: any, next: any) {
    UserAuth.checkAuth()
        .then((response: ResponseData) => {
            store.commit("auth/isLogin", response.data);
            // store.dispatch("login", response.data)

            if (response.data.success) next();
            else next({ path: "/" });
        })
        .catch((e: Error) => {
            // store.commit('a/progressBar', false)
            return next({ path: "/" });
        });
}

function notAuthenticated(to: any, from: any, next: any) {
    UserAuth.checkAuth()
        .then((response: ResponseData) => {
            // store.dispatch("login", response.data)
            store.commit("auth/isLogin", response.data);
            if (response.data.success) next({ path: "/admin" });
            else next();
        })
        .catch((e: Error) => {
            // store.commit('a/progressBar', false)
            return next();
        });
}

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
