import Vue from 'vue'
import Router from 'vue-router'
import indexvue from '@/components/sy'
import productvue from '@/components/product'
import listvue from '@/components/list'
import centervue from '@/components/center'

Vue.use(Router)

export default new Router({
	mode: 'history',
  routes: [
    {
      path: '/',
      component: indexvue
    },
    {
      path: '/index',
      component: indexvue
    },
    {
    	path: '/product',
    	name:'product',
      component: productvue
    },
    {
    	path: '/list',
    	name:'list',
      component: listvue
    },
    {
    	path: '/center',
    	name:'center',
      component: centervue
    }
  ],
  linkActiveClass:'cur'
})
