import { createRouter, createWebHistory } from "vue-router";

import productsIndex from '../components/products/index.vue';

import productNotFound from '../components/products/notFound.vue';

import editProduct from '../components/products/edit.vue';

import createProduct from '../components/products/create.vue';


//All the routes using vue-router in home page

const routes = [
    {
        path: '/',
        component: productsIndex
    },
    {
        path: '/:pathMatch(.*)*',
        component: productNotFound
    },
    {
        path: '/edit',
        component: editProduct
    },
    {
        path: '/create',
        component: createProduct
    }
]


const router = createRouter({
    history: createWebHistory(process.env.Base_URL),
    routes
});

export default router;