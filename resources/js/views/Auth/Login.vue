<template>
    <div>
        <!--Header-->
        <header id="up">
            <div class="header-slider">
                <div class="carousel slide" data-ride="carousel" id="slider">
                    <ol class="carousel-indicators  ">
                        <li class="active" data-slide-to="0" data-target="#slider"></li>
                        <li data-slide-to="1" data-target="#slider"></li>
                        <li data-slide-to="2" data-target="#slider"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item carousel-item--custom active">
                            <div class="carousel-caption carousel-caption--custom img-slide">
                                <!-- Header caption -->
                                <section class="header-text">
                                    <h1>{{$t("title")}}</h1>
                                    <h2>{{$t("sub_title")}}</h2>
                                    <p>{{$t("sub_title_bottom")}}</p>
                                </section>
                            </div>
                        </div>
                        <div class="carousel-item carousel-item--custom">
                            <div class="carousel-caption carousel-caption--custom img-slide">
                                <!-- Header caption -->
                                <section class="header-text">
                                    <h1>{{$t("title")}}</h1>
                                    <h2>{{$t("sub_title")}}</h2>
                                    <p>{{$t("sub_title_bottom")}}</p>
                                </section>
                            </div>
                        </div>
                        <div class="carousel-item carousel-item--custom">
                            <div class="carousel-caption carousel-caption--custom img-slide">
                                <!-- Header caption -->
                                <section class="header-text">
                                    <h1>{{$t("title")}}</h1>
                                    <h2>{{$t("sub_title")}}</h2>
                                    <p>{{$t("sub_title_bottom")}}</p>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
                <section id="auth-section">
                    <div class="container">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <h3 class="auth-header pl-5">{{$t("login.welcome")}}</h3>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="d-flex flex-row-reverse auth-nav">
                                    <router-link :to="{name: 'register'}" class="tab-link nav-link tab--custom"
                                                 data-tab="signup-tab">{{$t("register.title")}}
                                    </router-link>
                                    <router-link :to="{name: 'login'}" class="tab-link nav-link tab--custom currentTab"
                                                 data-tab="login-tab">{{$t("login.title")}}
                                    </router-link>
                                </div>
                            </div>
                        </div>

                        <!--Login Form-->
                        <div class=" form-sides tabContent current" id="login-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-12  col-sm-12 pl-5">
                                    <form @submit.prevent="login" class="login-form  text-center pr-3">

                                        <span v-if="loginError" :class="['badge badge-danger']">@{{ allerros }}</span>

                                        <div class="form-group form-group--custom">
                                            <input aria-describedby="emailHelp" class="form-control"
                                                   name="text" placeholder="Phone No. / Email Address" v-model="phone" autofocus
                                                   type="text">
                                        </div>

                                        <div class="form-group form-group--custom">
                                            <input aria-describedby="emailHelp" class="form-control" name="password"
                                                   placeholder="Password" v-model="login_password"
                                                   type="password">

                                        </div>

                                        <div class="form-group form-group--custom">
                                            <button aria-describedby="emailHelp"
                                                   class="form-control btn btn-danger--custom"
                                                    name="submit" type="submit">{{$t("login.title")}}</button>
                                        </div>
                                        <div class="form-group form-group--custom  last-form checkbox-wrapper">
                                            <div class="row">
                                                <div class="col-6 text-left">
                                                    <input checked class="custom-checkbox" id="checkbox-1"
                                                           type="checkbox">
                                                    <label class="checkmark" for="checkbox-1"></label>
                                                    <span>{{$t("login.remember")}}</span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <router-link :to="{name: 'Forgot'}" class="forget-pass">{{$t("forget.title")}}
                                                    </router-link>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="col-lg-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center flex-column"
                                    style="line-height: 1.5;">
                                    <h5 class="text-center p-2">{{$t("login.or")}}<br>{{$t("login.social")}}</h5>
                                    <SocialAuth></SocialAuth>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </header>

        <Best/>

    </div>
</template>


<script>

    import axios from 'axios';
    import Header from '../../components/Header';
    import Best from '../../components/Best';
    import store from '../../store';
    import SocialAuth from "../../components/SocialAuth";

    export default {
        name: 'Login',
        components: {Header, Best, SocialAuth},

        data: function () {
            return {
                settings: JSON.parse(localStorage.getItem('settings')),
                phone: '',
                login_password: '',
                loginError: false,
                allerros: '',
            };
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {
            this.phone = this.settings.country.code
        },
        methods: {
            login() {
                axios.post('/oauth/token', {
                    username: this.phone,
                    password: this.login_password,
                    grant_type: 'password',
                    client_id: 2,
                    client_secret:"9J6YdN9OO961fr99DICjE1ziJOfSoY7qzZPtIxDr",
                }).then(res => {
                        store.commit('loginUser');
                        localStorage.setItem('token', res.data.access_token);
                        axios.get('/api/user', {
                            headers: {
                                Authorization: 'Bearer ' + res.data.access_token
                            }
                        }).then(response => {
                            localStorage.setItem('user', JSON.stringify(response.data));
                            store.commit('setUser');
                        }).catch(error => {

                        });
                        this.$bus.$emit('logged', 'User logged');
                        this.$router.push({name: 'profile'});
                    }
                ).catch(error => {
                    console.log(error.response.data.error);
                    this.allerros = error.response.data.error;
                    this.loginError = true;
                    this.$notify({
                        group: 'foo',
                        title: 'Failed',
                        text: 'Login failed',
                        width: 500,
                        position: 'top left',
                        type: 'error'
                    });
                });
            }

        }


    }
</script>

<style scoped>

    .auth-header {
        text-align: center !important;
    }

</style>
