<template>
    <div>
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

                <!--========= Login / Sign up Form =========-->
                <section id="auth-section">
                    <div class="container">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <h3 class="auth-header pl-5">{{$t("welcome")}}</h3>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="d-flex flex-row-reverse auth-nav">
                                    <router-link :to="{name: 'register'}"
                                                 class="tab-link nav-link tab--custom currentTab" data-tab="signup-tab">
                                        sign up
                                    </router-link>
                                    <router-link :to="{name: 'login'}" class="tab-link nav-link tab--custom "
                                                 data-tab="login-tab">{{$t("login.title")}}
                                    </router-link>
                                </div>
                            </div>
                        </div>

                        <!--sign up form-->
                        <div class="tabContent current" id="signup-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-12  col-sm-12 pl-5">
                                    <form @submit.prevent="signUp" class="login-form  text-center pr-3">
                                        <div>
                                            <span v-if="allerros.role" :class="['badge badge-danger']">@{{ allerros.role[0] }}</span>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label check-wrapper" for="inlineRadio11">
                                                <input checked v-model="role"
                                                       class="form-check-input form-check-input--custom"
                                                       id="inlineRadio11" name="role" type="radio" value="2">
                                                <span class="check"></span>
                                                {{$t("helper")}} </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label check-wrapper" for="inlineRadio22">
                                                <input class="form-check-input form-check-input--custom"
                                                       id="inlineRadio22" v-model="role"
                                                       name="role" type="radio" value="3">
                                                <span class="check"></span>
                                                {{$t("employer")}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label check-wrapper" for="inlineRadio33">
                                                <input class="form-check-input form-check-input--custom"
                                                       id="inlineRadio33" v-model="role"
                                                       name="role" type="radio" value="4">
                                                <span class="check"></span>
                                                {{$t("expert")}}</label>

                                        </div>
                                        <div class="form-group form-group--custom" style="display: inline-flex;"
                                             :class="['form-group', allerros.first_name ? 'has-danger' : '']">
                                            <input aria-describedby="nameHelp" class="form-control" autofocus
                                                   name="name" placeholder="First Name" v-model="first_name"
                                                   :class="['form-control', allerros.first_name ? 'has-danger' : '']"
                                                   type="text">

                                            <input aria-describedby="nameHelp" class="form-control"
                                                   name="name" placeholder="Last Name" v-model="last_name"
                                                   style="margin-left: 6px;"
                                                   :class="['form-control', allerros.last_name ? 'has-danger' : '']"
                                                   type="text">
                                            <span v-if="allerros.last_name" :class="['badge badge-danger']">@{{ allerros.last_name[0] }}</span>
                                        </div>
                                        <div class="form-group form-group--custom"
                                             :class="['form-group', allerros.email ? 'has-danger' : '']">
                                            <input aria-describedby="nameHelp" class="form-control"
                                                   name="email" placeholder="Email Address" v-model="email"
                                                   :class="['form-control', allerros.email ? 'has-danger' : '']"
                                                   type="text">

                                            <span v-if="allerros.email" :class="['badge badge-danger']">@{{ allerros.email[0] }}</span>
                                        </div>
                                        <div class="form-group form-group--custom" style="display: inline-flex"
                                             :class="['form-group', allerros.code ? 'has-danger' : '']">
                                            <input aria-describedby="nameHelp" class="form-control"
                                                   name="text" placeholder="Phone No." v-model="code" style="width: 60px"
                                                   :class="['form-control', allerros.code ? 'has-danger' : '']"
                                                   type="text">

                                            <input aria-describedby="nameHelp" class="form-control"
                                                   style="margin-left: 6px;"
                                                   name="text" placeholder="Phone No." v-model="phone"
                                                   :class="['form-control', allerros.phone ? 'has-danger' : '']"
                                                   type="text">
                                            <span v-if="allerros.phone" :class="['badge badge-danger']">@{{ allerros.phone[0] }}</span>
                                        </div>

                                        <div class="form-group form-group--custom"
                                             :class="['form-group', allerros.password ? 'has-danger' : '']">
                                            <input aria-describedby="emailHelp" class="form-control" name="password"
                                                   placeholder="Password" v-model="password"
                                                   :class="['form-control', allerros.password ? 'has-danger' : '']"
                                                   type="password">
                                            <span v-if="allerros.password" :class="['badge badge-danger']">@{{ allerros.password[0] }}</span>
                                        </div>
                                        <div class="form-group form-group--custom mb-4">
                                            <button aria-describedby="emailHelp"
                                                   class="form-control btn btn-danger--custom"
                                                    name="submit" type="submit">{{$t("register.title")}}</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="col-lg-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center flex-column"
                                    style="line-height: 1.5;">
<!--                                    <h5 class="text-center p-2">{{$t("login.or")}}<br>{{$t("login.social")}}</h5>-->
<!--                                   <SocialAuth></SocialAuth>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </header>


        <best></best>
        <expert></expert>

    </div>
</template>


<script>
    import axios from 'axios';
    import Header from '../../components/Header';
    import Best from '../../components/Best';
    import SocialAuth from "../../components/SocialAuth";
    import Expert from "../../components/Expert";

    export default {
        name: 'Register',
        components: {Header, Best,SocialAuth,Expert},

        data: function() {
            return {
                settings: JSON.parse(localStorage.getItem('settings')),
                role: '',
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                password: '',
                code: null,
                loginError: false,
                allerros: [],
            };
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {
            this.code = this.settings.country.code
        },
        methods: {
            signUp() {
                axios.post('/api/register', {
                    role: this.role,
                    name: this.first_name + this.last_name,
                    email: this.email,
                    phone: this.code + this.phone,
                    password: this.password,
                    c_password: this.password
                }).then(
                    res => {
                        console.log(res);
                        this.$router.push({name: 'login'});
                    }
                ).catch(error => {
                    this.allerros = error.response.data.date;
                    this.$notify({
                        group: 'foo',
                        title: 'Failed',
                        text: 'Register failed',
                        width: 500,
                        position: 'top left',
                        type: 'error'
                    });
                })

            },
        }
    }
</script>

<style scoped>
    #auth-section .form-group--custom input {
        height: 2.600rem;
    }
    .social button {
        border: none;
    }

    #auth-section .form-group--custom {
        width: 100%;
    }
</style>
