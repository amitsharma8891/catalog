import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      redirect: '/home'
    },
    {
      path: '/home',
      component: require('../components/ExampleComponent.vue').default
    },
    {
      path: '/category',
      name: 'category-list',
      component: require('../components/category/IndexComponent.vue').default
    },
    {
      path: '/category/create',
      component: require('../components/category/CreateComponent.vue').default
    },
    {
      path: '/category/edit/:category_id',
      component: require('../components/category/EditComponent.vue').default
    },
    {
      path: '/product',
      name: 'product-list',
      component: require('../components/product/IndexComponent.vue').default
    },
    {
      path: '/product/create',
      component: require('../components/product/CreateComponent.vue').default
    },
    {
      path: '/product/edit/:product_id',
      component: require('../components/product/EditComponent.vue').default
    }
  ]
})

export default router
