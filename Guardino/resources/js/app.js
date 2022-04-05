require('./bootstrap');
import Vue from 'vue';
import Vuex from 'vuex';

import App from './components/App.vue';
import router from './router';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        sensors: null,
    },
    mutations: {
        sensors (state, arrS) {
            state.sensors = arrS;
        }
    },
    getters: {
    },
    actions: {
    }
});

new Vue({
    el: '#app',
    router,
    store,
    components: {App}
});
