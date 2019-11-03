<template>
    <div>
        <div class="social p-2">
            <a @click="AuthProvider('facebook')"><i class="fab fa-facebook-square fa-2x"></i></a>
            <a @click="AuthProvider('twitter')"><i class="fab fa-twitter-square fa-2x"></i></a>
            <a @click="AuthProvider('google')"> <i class="fab fa-google-plus-square fa-2x"></i></a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import store from "../store";

    export default {
        name: "SocialAuth",
        data: function () {
            return {
                allerros: [],
                settings: JSON.parse(localStorage.getItem('settings')),
            }
        },

        methods: {
            AuthProvider(provider) {
                var self = this;
                this.$auth.authenticate(provider).then(response => {

                    self.SocialLogin(provider, response)

                }).catch(err => {
                    console.log({err: err})
                })
            },
            SocialLogin(provider, response) {
                this.$http.post('api/auth/login/' + provider, response).then(response => {
                    store.commit('loginUser');
                    localStorage.setItem('token', response.data.access_token);
                    axios.get('/api/user', {
                        headers: {
                            Authorization: 'Bearer ' + response.data.access_token
                        }
                    }).then(response => {
                        localStorage.setItem('user', JSON.stringify(response.data));
                        store.commit('setUser');
                    }).catch(error => {
                    });
                    this.$bus.$emit('logged', 'User logged');
                    this.$router.push({name: 'profile'});

                }).catch(err => {
                    console.log({err: err})
                })
            },
        }
    }
</script>

<style scoped>

</style>
