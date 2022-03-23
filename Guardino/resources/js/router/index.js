import Vue from 'vue';
import Router from 'vue-router';

import Home from '../components/Home.vue';
import Plant from '../components/Plant.vue';

Vue.use(Router);

export default new Router({
    routes: [
        {
          path: "*",
          redirect: "/home"
        },
        {
          path: "/home",
          component: Home
        },
        {
          path: "/plant",
          component: Plant
        }
      ]
});
