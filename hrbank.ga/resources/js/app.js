import Multiselect from "vue-multiselect";
import Datepicker from "vuejs-datepicker";
import VueTimepicker from 'vue2-timepicker';

window.Vue = require('vue');

Vue.component('field-input', require('./components/field-input').default);
Vue.component('field-select', require('./components/field-select').default);
Vue.component('field-textarea', require('./components/field-textarea').default);
Vue.component('tabs', require('./components/tabs').default);
Vue.component('list', require('./components/list').default);
Vue.component('requirements', require('./components/requirements').default);
Vue.component('multiselect', Multiselect);
Vue.component('datepicker', Datepicker);
Vue.component('VueTimepicker', VueTimepicker);

const app = new Vue({
    el: '#app',
    data: {},
    methods: {
        getPositionData(){
            document.getElementById('position_data').value = JSON.stringify(this.$refs.req.getLines());
            document.getElementById('position_form').submit();
        }
    }
});
