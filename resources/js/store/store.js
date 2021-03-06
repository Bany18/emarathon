import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";
import { createFlashStore } from 'vuex-flash';
import locations from './modules/locations';

Vue.use(Vuex)
export default new Vuex.Store({
    strict: true,
    plugins: [createPersistedState(),  createFlashStore()],
    modules: {
        locations
    },
})