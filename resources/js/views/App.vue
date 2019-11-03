<template>
    <div>
        <notifications position="top left" width="400" group="foo"/>
        <Header/>
        <transition name="moveInUp">
            <router-view></router-view>
        </transition>
        <Footer/>
        <div v-if="!modal" aria-hidden="true" aria-labelledby="homeModal" class="modal fade" id="homeModal"
             role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <a class="custom-link" href="#"><img alt="logo" class="modal-logo" src="../assets/img/logo.png"></a>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        </button>
                    </div>
                    <section>
                        <div class="modal-body text-center pt-0">
                            <section>
                                <h3 class="modal-heading">
                                    {{$t("app.title")}}
                                </h3>
                                <form class="modal-form">
                                    <div class="form-group form-select">
                                        <label class="col-form-label sr-only"
                                               for="Country">{{$t("job.country")}}</label>
                                        <div class="input-field custom-filed">
                                            <model-list-select class="select form-control" id="Country"
                                                               :list="countries"
                                                               option-value="id"
                                                               option-text="title"
                                                               v-model="item.country"
                                                               placeholder="select country">
                                            </model-list-select>
                                            <!--<select class="form-control" id="Country" v-model="item.country" name="country">-->
                                            <!--<option disabled selected value="">country</option>-->
                                            <!--<option v-for="country in countries"-->
                                            <!--:value="country.id">{{ country.title-->
                                            <!--}}-->
                                            <!--</option>-->
                                            <!--</select>-->
                                        </div>
                                    </div>

                                    <div class="form-group form-select">
                                        <label class="col-form-label sr-only">{{$t("app.lang")}}</label>
                                        <div class="input-field custom-filed">
                                            <model-list-select class="select form-control" id="Country" :list="langs"
                                                               option-value="id"
                                                               option-text="title"
                                                               v-model="test"
                                                               placeholder="select language">
                                            </model-list-select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="input-filed mx-auto mt-2">
                                            <a class="form-control btn btn-danger--custom" name="submit"
                                               @click.prevent="getSettings">{{$t("continue")}}</a>
                                        </div>
                                    </div>
                                </form>

                                <!-- Modal Footer -->
                                <!--                    <div class="modal-footer border-top-0 justify-content-center">-->
                                <!--<a class="custom-link" href="#"><img alt="app store" src="../assets/img/appStore.png"></a>-->
                                <!--<a class="custom-link" href="#"><img alt="play store" src="../assets/img/googlePlay.png"></a>-->
                                <!--                    </div>-->
                                <!--<div class="about-us">-->
                                <!--<div class="social-icon m-0 text-center">-->
                                <!--<a href="#"><i class="fab fa-facebook-square subscribe-icon"></i></a>-->
                                <!--<a href="#"><i class="fab fa-twitter subscribe-icon"></i></a>-->
                                <!--<a href="#"><i class="fab fa-instagram subscribe-icon"></i></a>-->
                                <!--<a href="#"><i class="fab fa-youtube subscribe-icon"></i></a>-->
                                <!--<a href="#"><i class="fab fa-google-plus-g subscribe-icon"></i></a>-->
                                <!--<a href="#"><i class="fab fa-pinterest-p subscribe-icon"></i></a>-->
                                <!--</div>-->
                                <!--</div>-->
                            </section>
                            <div class="modal-img">
                                <img alt="" src="../assets/img/mery-newpng.png">
                            </div>
                        </div>


                    </section>
                </div>

            </div>
        </div>

    </div>
</template>
<script>
    import Header from '../components/Header'
    import Footer from "../components/Footer";
    import store from '../store'
    import axios from 'axios';
    import {ModelListSelect} from 'vue-search-select';

    var _ = require('lodash');
    export default {
        name: 'App',
        components: {Header, Footer, ModelListSelect},
        data() {
            return {
                countries: [],
                langs: [],
                test: 1,
                settings: null,
                item: {
                    country: 1,
                    lang: 1
                },
                modal: !!localStorage.getItem('settings'),
            }
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {
            this.getCountries();
            this.getLangs();
            if (localStorage.token) {
                axios.get('/api/user', {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    },
                ).then(response => {
                    store.commit('loginUser')
                }).catch(error => {
                    if (error.response.status === 401 || error.response.status === 403) {
                        store.commit('logoutUser');
                        localStorage.setItem('token', '');
                        this.$router.push({name: 'login'})
                    }

                });
            }

        },
        methods: {
            getSettings() {
                axios.get(`/api/settings/${this.item.country}`, {}).then(res => {
                    this.settings = res.data.data;
                    localStorage.setItem('settings', JSON.stringify(this.settings));
                    this.modal = !!localStorage.getItem('settings');
                    document.getElementsByTagName('body')[0].classList.remove('modal-open');
                    document.getElementsByClassName('modal-backdrop')[0].remove();
                }).catch(err => {

                });
            },
            getCountries() {
                axios.get('/api/worker/country', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.countries = _.values(res.data.data);
                })
            },
            getLangs() {
                axios.get('/api/lang', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.langs = _.values(res.data.data);
                })
            }
        }

    }
</script>

<style scoped>
    @import '../assets/css/style.css';

    .moveInUp-enter-active {
        animation: fadeIn .4s ease-in;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }

    .notifications {
        font-size: 16px;
    }
</style>
