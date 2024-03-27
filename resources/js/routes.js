import { createWebHistory, createRouter } from 'vue-router'
import dashboard from './dashboard.vue'
import category from './component/Category.vue'
import User from './component/User.vue'
import Product from './component/Product.vue'
import Signup from './component/Signup.vue'

const routes = [

    {
        name: 'Signup',
        path: '/signup',
        component: Signup,

    },
    {
        name: 'User',
        path: '/user',
        component: User,
    },
    {
        name: 'category',
        path: '/category',
        component: category,
    },
    {
        name: 'Product',
        path: '/product',
        component: Product,
    },



];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
//asdfasdf