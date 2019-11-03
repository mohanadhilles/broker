import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isLoggedIn: !!localStorage.getItem('token'),
        user:  localStorage.getItem('user'),
    },
    mutations: {
        loginUser (state) {
            state.isLoggedIn = true
        },
        logoutUser (state) {
            state.isLoggedIn = false
        },
        setUser (state) {
            state.user = Object.assign(JSON.parse(localStorage.getItem('user')));
        }
    }
})
