/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import {EventBus} from "./config/event-bus";
import router from './router';
import AppComponent from './components/AppComponent';
import store from "./store/store";
import Loading from 'vue-loading-overlay';
import Vuetify from 'vuetify'
import vuetify from './plugins/vuetify'
import 'vue-loading-overlay/dist/vue-loading.css';
import { Form, HasError, AlertError } from 'vform';
import VueProgressBar from 'vue-progressbar';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import Swal from 'sweetalert2';
import VueToastify from "vue-toastify";
import "./assets/css/custom-styles.css";
import Vue2Filters from 'vue2-filters'
import VuePageTransition from 'vue-page-transition';
import VueTheMask from 'vue-the-mask';
import VuexFlash from 'vuex-flash';


require('./bootstrap');

Vue.use(VuexFlash, { mixin: true });
Vue.use(require("vue-moment"));
window.Vue = require('vue');
Vue.use(Loading , {
  loader: "bars",
  color: "#04537d",
  width: 50,
  height: 50,
});
Vue.use(Vuetify);
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.use(VueProgressBar, options);
Vue.use(VueToastify, {
    position: "top-right",
    errorDuration: 1000,
    successDuration: 1000,
    theme: "light"
});

var Vue2FiltersConfig = {
  capitalize: {
    onlyFirstLetter: false
  },
  number: {
    format: '0',
    thousandsSeparator: ',',
    decimalSeparator: '.'
  },
  bytes: {
    decimalDigits: 2
  },
  percent: {
    decimalDigits: 2,
    multiplier: 100,
    decimalSeparator: '.'
  },
  currency: {
    symbol: 'TZS',
    thousandsSeparator: ',',
    symbolOnLeft: true,
    spaceBetweenAmountAndSymbol: true,
    showPlusSign: false,
    decimalDigits: 0
  },
  pluralize: {
    includeNumber: false
  },
  ordinal: {
    includeNumber: false
  }
}
Vue.use(Vue2Filters, Vue2FiltersConfig)

Vue.use(VuePageTransition);
Vue.use(VueTheMask);
const options = {
  color: '#04537d',
  failedColor: '#874b4b',
  thickness: '30px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false,
  position: 'absolute'
}


window.Swal = Swal;
window.Toast = Toast;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

Vue.config.devtools = false
Vue.config.debug = false
Vue.config.silent = true


const app = new Vue({
  components: { AppComponent },
  router,
  store,
  EventBus,
  vuetify
}).$mount('#app')