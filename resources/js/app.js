require('./bootstrap');

import { createApp } from 'vue';
import Navbar from './components/Navbar.vue';
import SavingsForm from './components/SavingsForm.vue';
import SearchForm from './components/SearchForm.vue';

createApp({})
    .component('navbar', Navbar)
    .component('savings-form', SavingsForm)
    .component('search-form', SearchForm)
    .mount('#app');
