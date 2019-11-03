<template>
    <nav class="navbar navbar-expand-lg pos pt-0" id="top-nav">
        <div class="container">
            <router-link :to="`/${$i18n.locale}`" class="navbar-brand">
                <img alt="" class="nav-logo" src="../assets/img/logo.png">
            </router-link>
            <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"
                    data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
                <i class="fas fa-bars fa-2x icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <template v-if="isLoggedIn">
                        <li data-toggle="collapse" data-target=".navbar-collapse.show" v-if="authUser" class="nav-item nav-login nav-user">
                            <router-link :to="`/${$i18n.locale}`" class="nav-link nav-user-link">{{ authUser.name }}</router-link>
                        </li>

                        <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-signup nav-logout">
                            <a  @click.prevent="logout" class="nav-link nav-logout-link">{{$t("logout")}}</a>
                        </li>

                    </template>
                    <template v-if="!isLoggedIn">
                        <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-login">
                            <router-link :to="{name:'login'}" class="nav-link nav-login-link">{{$t("login.title")}}</router-link>
                        </li>

                        <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-signup">
                            <router-link :to="{name:'register'}" class="nav-link nav-signup-link">{{$t("register.title")}}</router-link>
                        </li>
                    </template>

                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom">
                        <router-link :to="{name: 'home'}" class="nav-link nav-link--custom">{{$t("nav.home")}}</router-link>
                    </li>
                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom">
                        <router-link :to="{name: 'want_mery'}" class="nav-link nav-link--custom">{{$t("nav.need_mery")}}</router-link>
                    </li>
                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom">
                        <router-link :to="{name: 'about'}" class="nav-link nav-link--custom">{{$t("nav.about")}} </router-link>
                    </li>
                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom">
                        <router-link  :to="{name: 'contactUs'}" class="nav-link nav-link--custom">{{$t("nav.contact")}}</router-link>
                    </li>

                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom">
                        <router-link  :to="{name: 'register'}" class="nav-link nav-link--custom">{{$t("nav.become")}}</router-link>
                    </li>
                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom">
                        <router-link :to="{name: 'register'}" class="nav-link nav-link--custom ">{{$t("nav.become_agency")}}</router-link>
                    </li>
                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item nav-item--custom" >
                        <language-switcher></language-switcher>
                    </li>
                </ul>
              <language-switcher class="hidden-md hidden-lg"></language-switcher>
            </div>
        </div>
    </nav>
</template>

<script>

    import store from '../store';
    import  axios from 'axios';
    import LanguageSwitcher from "./LanguageSwitcher";
    export default {
        name: 'Header',
        components:{LanguageSwitcher},
        data() {
            return {
                authUser: null,
                isLoggedIn: this.checkIfIsLogged()
            };
        },
        created: function () {

            let that = this;
            this.$bus.$on('logged', function() {
                that.isLoggedIn = that.checkIfIsLogged();
                that.getCurrent();
            });

            this.$bus.$on('logedout', function () {
                that.isLoggedIn = that.checkIfIsLogged();
            });

            if(this.isLoggedIn) that.getCurrent();


        },
        methods: {
            logout() {
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                store.commit('logoutUser');
                this.$bus.$emit('logedout', 'User logedout');
                this.$router.push({name: 'home'});
            },
            getCurrent() {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.authUser = res.data;
                })
            },
            checkIfIsLogged() {
                let token = localStorage.getItem('token');
                return !!token;
            }

        }
    }
</script>
<style scoped>

    @media (max-width: 750px) {
        #top-nav .nav-item--custom:last-child {
            display: none !important;
        }
    }
    @media (min-width: 750px) and (max-width: 970px) {
        #top-nav .nav-item--custom:last-child {
            display: none !important;
        }
    }
    @media (min-width: 970px) and (max-width: 1170px) {
        .hidden-md, .hidden-lg{
            visibility: hidden !important;
        }
    }
    @media (min-width: 1170px) {
        .hidden-md, .hidden-lg{
            visibility: hidden !important;
        }
    }

</style>



