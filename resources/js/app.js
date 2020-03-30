require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import locale from 'element-ui/lib/locale/lang/vi';
import ElementUI from 'element-ui';
import * as filters from './filters'; // global filters
import Select2 from 'v-select2-component';
import money from 'v-money';
import Multiselect from 'vue-multiselect';
import Chartkick from 'vue-chartkick'
import Chart from 'chart.js';
import Donut from 'vue-css-donut-chart';
import 'vue-css-donut-chart/dist/vcdonut.css';
import VueApexCharts from 'vue-apexcharts';

Vue.use(VueApexCharts)

Vue.use(Donut);

Vue.use(VueRouter);
Vue.use(ElementUI, { locale });
Vue.use(money, {decimal: '.',thousands: ',',prefix: '',suffix: '',precision: 0,masked: false});
Vue.component('select2', Select2);
Vue.component('multiselect', Multiselect);
Vue.component('apexchart', VueApexCharts);
Vue.use(Chartkick.use(Chart));


// register global utility filters.
Object.keys(filters).forEach(key => {
    Vue.filter(key, filters[key]);
});



import routers from './routes';

const router = new VueRouter({
    mode: 'history',
    routes: routers
})

const app = new Vue({
    el: '#app',
    router
});
