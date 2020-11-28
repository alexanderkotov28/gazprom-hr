// import variables from '../sass/_variables.scss';

// window.variables = variables;
window.Vue = require('vue');

Vue.component('field-input', require('./components/field-input').default);
Vue.component('field-select', require('./components/field-select').default);

const app = new Vue({
    el: '#app',
    data: {}
});
