import Vue from 'vue';
import Router from 'vue-router';
import Index from "./components/Index";
import login from "./components/auth/login"
import register from "./components/auth/register"
import forget from "./components/auth/forget"
import logout from "./components/auth/logout"
import AddEmployee from "./components/pages/AddEmployee";
import AllEmployee from "./components/pages/AllEmployee";
import AddSupplier from "./components/pages/AddSupplier"
import AllSuppliers from "./components/pages/AllSuppliers";
import AllProducts from "./components/pages/AllProducts";
import AddProduct from "./components/pages/AddProduct";

Vue.use(Router)

const routes = [
    {
        path: '/',
        component: login,
        name: 'login'
    },
    {
        path: '/home',
        component: Index,
        name: 'Index'
    },
    {
        path: '/register',
        component: register,
        name: 'register'
    },
    {
        path: '/forget',
        component: forget,
        name: 'forget'
    },
    {
        path: '/logout',
        component: logout,
        name: 'logout'
    },
    {
        path: '/addEmployee',
        component:AddEmployee ,
        name: 'addEmployee'
    },
    {
        path: '/allEmployees',
        component:AllEmployee ,
        name: 'allEmployees'
    },
    {
        path: '/addSupplier',
        component:AddSupplier ,
        name: 'addSupplier'
    },
    {
        path: '/allSuppliers',
        component:AllSuppliers ,
        name: 'allSuppliers'
    },
    {
        path: '/allProducts',
        component:AllProducts,
        name: 'allProducts'
    },
    {
        path: '/addProduct',
        component:AddProduct ,
        name: 'addProduct'
    },



]

export default new Router({
    mode:'history',
    routes
})
