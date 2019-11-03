<template>

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
                            <section class="header-text">
                                <h1>{{$t("title")}}</h1>
                                <h2>{{$t("sub_title")}}</h2>
                                <p>{{$t("sub_title_bottom")}}</p>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item carousel-item--custom">
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
                </div>
            </div>

            <section id="forgetPassword">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="left-icon-section pb-3">
                                <router-link :to="{name: 'login'}" class="custom-link">
                                    <i class="fas fa-chevron-left d-inline-block icon"></i>
                                    <p class="d-inline-block">{{$t("login.title")}}</p>
                                </router-link>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <form @submit.prevent="forCode" class="login-form  text-center pr-3">
                                <div class="left-section">
                                    <h2 class="auth-header text-left">{{$t("forget.title")}}</h2>
                                    <p class="enterEmail py-2">{{$t("forget.sub")}}</p>
                                    <div class="form-group form-group--custom">
                                        <input aria-describedby="emailHelp" class="form-control"
                                               name="code" placeholder="Your Code" v-model="code"
                                               type="number">
                                    </div>
                                    <p class="newPassword">{{$t("forget.sub_bottom")}}</p>
                                    <div class="form-group form-group--custom pt-3">
                                        <button aria-describedby="emailHelp"
                                               class="form-control btn btn-danger--custom"
                                                name="submit" type="submit">{{$t("send")}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 right-section">
                            <img src="../../assets/img/auth.png" width="400">
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </header>
</template>


<script>
    import axios from 'axios';
    import Header from "../../components/Header";
    import Best from "../../components/Best";
    import Forgot from "./Forgot";

    export default {
        name: "Check",
        components: {Header, Best, Forgot},
        props: {
            phone: {
                type: String,
            },
        },
        data() {
            return {
                code: '',
            };
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {

        },
        methods: {
            forCode() {
                axios.post('api/verify/check', {
                    phone: this.phone,
                    code: this.code,
                }).then(res => {
                    console.log(res.data);
                    if (res.data.code !== 200) {
                        this.loginError = true;
                        this.$notify({
                            group: 'foo',
                            title: 'Failed',
                            text: 'Login failed',
                            width: 500,
                            position: 'top left',
                            type: 'error'
                        });
                    }
                    this.$router.push({name: 'NewPassword'})


                }).catch(error => {
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

            },
        }
    }

</script>

<style scoped>
    #forgetPassword .form-group--custom input {
        width: 100%;

    }
</style>
