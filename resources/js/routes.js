import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent'

import ContactsComponent from './pages/ContactsComponent'

import NotFoundComponent from './pages/NotFoundComponent'

import BlogComponent from './pages/BlogComponent'

import ChiSiamoComponent from './pages/ChiSiamoComponent'


const router = new VueRouter({
    mode: 'history',
    routes: [
      {
        path:'/',
        name:'home',
        component: HomeComponent
      },
      {
        path:'/blog',
        name:'blog',
        component: BlogComponent
      },
      {
        path:'/chi-siamo',
        name:'chi-siamo',
        component: ChiSiamoComponent
      },
      {
        path:'/contacts',
        name:'contacts',
        component: ContactsComponent
      },
      {
        // deve essere messo all'ultimo posto 
        path:'/*',
        name:'notFound',
        component: NotFoundComponent
      }
    ]
})


export default router;