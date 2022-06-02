import { createRouter, createWebHistory } from "vue-router";

import listProducts from '../components/products/list.vue';

import productNotFound from '../components/products/notFound.vue';

import editProduct from '../components/products/edit.vue';

import createProduct from '../components/products/create.vue';

//All the routes using vue-router in home page

const routes = [
    {
        path: '/',
        component: listProducts,
        name: 'home'
    },
    {
        path: '/:pathMatch(.*)*',
        component: productNotFound,
        name: 'not found'
    },
    {
        path: '/edit/:id',
        component: editProduct
    },
    {
        path: '/create',
        component: createProduct
    },
]


const router = createRouter({
    history: createWebHistory(process.env.Base_URL),
    routes
});

export default router;