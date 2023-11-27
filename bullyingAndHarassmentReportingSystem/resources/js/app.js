import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Vue.component('report-chart', require('./components/ReportChart.vue').default);

