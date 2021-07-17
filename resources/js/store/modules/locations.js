import axios from "axios";
import createPersistedState from "vuex-persistedstate";
import { BASE_URL } from "./../../config/MainURL";

const locations = {
    namespaced: true,
    state: {
        getregions: [],
        getcountries: [],
    },

    plugins: [createPersistedState()],

    getters: {
        getregions: state => {
            return state.getregions;
        },
        getcountries: state => {
            return state.getcountries;
        },

    },

    actions: {
        LOAD_REGIONS: function ({ commit }) {
            axios
                .get(BASE_URL + "/pub/v1/regions")
                .then(r => r.data)
                .then(
                    getregions => {
                        commit("SET_REGIONS", getregions);
                    },
                    err => {
                        console.log(err);
                    }
                );
        },
        LOAD_COUNTRIES: function ({ commit }) {
            axios
                .get(BASE_URL + "/pub/v1/countries")
                .then(r => r.data)
                .then(
                    getcountries => {
                        commit("SET_COUNTRIES", getcountries);
                    },
                    err => {
                        console.log(err);
                    }
                );
        }
    },

    mutations: {
        SET_REGIONS(state, getregions) {
            state.getregions = getregions;
        },
        SET_COUNTRIES(state, getcountries) {
            state.getcountries = getcountries;
        }
    }
};

export default locations;