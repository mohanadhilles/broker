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
                                <p>Search for after-school sitters, nannies, senior care and more.</p>
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
                            <form @submit.prevent="forGet"class="login-form  text-center pr-3">
                                <span v-if="loginError" :class="['badge badge-danger']">@{{ allerros }}</span>
                                <div class="left-section">
                                    <h2 class="auth-header text-left">{{$t("forget.title")}}</h2>
                                    <p class="enterEmail py-2">{{$t("forget.phone")}}</p>
                                    <div class="form-group form-group--custom">
                                        <input aria-describedby="emailHelp" class="form-control"
                                               name="phone" placeholder="Your Phone" v-model="phone"
                                               type="text">
                                    </div>
                                    <p class="newPassword">{{$t("forget.send")}}</p>
                                    <div class="form-group form-group--custom pt-3">
                                        <button aria-describedby="emailHelp" class="form-control btn btn-danger--custom" name="submit" type="submit">{{$t("send")}}</button>
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

    export default {
        name: "Forget",
        components: {Header, Best},

        data() {
            return {
                phone: '',
                allerros: '',
                loginError: false,
            };
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {

        },
        methods: {
            forGet() {
                axios.post('/api/verify/verification', {
                    phone: this.phone,
                }).then(res => {
                        console.log(res.data);
                        if (!res.data.data == "pending"){
                            this.loginError = true;
                        }
                    this.$router.push({name:'Check'})

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
            }

        }

        }
</script>

<style scoped>
    #forgetPassword .form-group--custom input{
        width: 100%;

    }
</style>
