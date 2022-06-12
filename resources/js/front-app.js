/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.axios = require('axios');

// questo comando va a impostare il tipo di richiesta nell'header
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'; 



// axios.get('http://127.0.0.1:8000/api/posts').then(results=>{
//     console.log(results);
// }).catch(e=>{
//     console.log(e);
// })

window.Vue = require('vue');

import AppComponent from './app/AppComponent'

import router from './routes'

// AppComponent = require ('./app/App.component.vue').default


const app = new Vue({
    // in thi chunck of code we say, take the el where is the div with id app and renderise inside the AppComponent, looking also for the routes
    el: '#app',
    render: (createElement) => createElement(AppComponent),
    router 
});


// console.log(app);