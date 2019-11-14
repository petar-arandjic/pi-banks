/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('app', require('./components/App.vue').default);
//Transactions components
Vue.component('nav-bar', require('./components/AppTransactionsComponents/Nav_bar.vue').default);
Vue.component('app-banke', require('./components/AppTransactionsComponents/AppBanke.vue').default);
Vue.component('hb-NB-Crad', require('./components/AppTransactionsComponents/Horizontal.BankeNavBarCard.vue').default);
Vue.component('bank-Transaction-window', require('./components/AppTransactionsComponents/Bank.TransactionWindow.vue').default);
Vue.component('bank-main-info', require('./components/AppTransactionsComponents/Bank.MainInfo.vue').default);
//Banks components
Vue.component('bank', require('./components/AppBanksComponents/Banks.vue').default);
Vue.component('bank-cell', require('./components/AppBanksComponents/BankCell.vue').default);

// Orders
Vue.component('app-orders', require('./components/Orders/Orders.vue').default);
Vue.component('order-cell', require('./components/Orders/Order-cell.vue').default);
Vue.component('order-form', require('./components/Orders/Order-form.vue').default);

import BootstrapVue from 'bootstrap-vue' //Importing
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue) // Telling Vue to use this in whole application

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    el: '#test'
});
