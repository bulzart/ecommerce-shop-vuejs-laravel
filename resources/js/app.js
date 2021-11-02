/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 import Vue from 'vue'
 import axios from 'axios'
 import VueAxios from 'vue-axios'
 window.Vue = require('vue').default;
 
 
 
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 
 const app = new Vue({
     el: '#app',
 });
 app.use(VueAxios, axios)
 export default{
     data(){
         return{
             buli: 'buli'
         }
     }
 }
 
 
 