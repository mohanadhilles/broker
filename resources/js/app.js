import Vue from 'vue'
import VueRouter from 'vue-router';
import EventBus from './event-bus';
import Notifications from 'vue-notification'
import axios from 'axios';
import VueAxios from 'vue-axios'
import VueSocialauth from 'vue-social-auth'

import store from './store';
import social from "./plugin/social";
import i18n from './plugin/i18n'
import router from './plugin/router'
import 'vue-search-select/dist/VueSearchSelect.css'

import App from './views/App';


Vue.use(VueAxios, axios);
Vue.use(Notifications);
Vue.use(VueRouter);
Vue.config.productionTip = false;
Vue.prototype.$bus = EventBus;

router.beforeEach((to, from, next) => {
    if (to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        next({name: 'login'});
        return
    }
    if ((to.path === '/login' || to.path === '/register') && store.state.isLoggedIn) {
        next({name: 'profile'});
        return
    }
    next()
});

Vue.use(VueSocialauth, social);


axios.defaults.baseURL = 'https://broker.dev/';
process.env.MIX_APP_URL;

router.beforeEach((to, from, next) => {
    let language = to.params.lang;
    if (!language) {
        language = 'en'
    }
    i18n.locale = language;
    next()
});

const app = new Vue({
    el: '#app',
    router,
    i18n,
    components: {App},

});
