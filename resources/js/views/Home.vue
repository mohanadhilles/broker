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
                                    <h1> {{$t("title")}} </h1>
                                    <h2>{{$t("sub_title_left")}}</h2>
                                    <p>{{$t("sub_title_left_bottom")}}</p>
                                </section>
                            </div>
                        </div>

                        <div class="carousel-item carousel-item--custom">
                            <div class="carousel-caption carousel-caption--custom img-slide">
                                <!-- Header caption -->
                                <section class="header-text">
                                    <h1> {{$t("title")}} </h1>
                                    <h2>{{$t("sub_title_left")}}</h2>
                                    <p>{{$t("sub_title_left_bottom")}}</p>
                                </section>
                            </div>
                        </div>
                        <div class="carousel-item carousel-item--custom">
                            <div class="carousel-caption carousel-caption--custom img-slide">
                                <!-- Header caption -->
                                <section class="header-text">
                                    <h1> {{$t('title')}} </h1>
                                    <h2>{{$t('sub_title_right')}}</h2>
                                    <p>{{$t("sub_title_right_bottom")}}</p>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
                <section id="started-section">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-12">
                            <h3 class="main-heading pl-5">{{$t('sub_title')}}</h3>
                            <div class="line"></div>
                        </div>
                        <div class="col-lg-6 col-12 col-custom">
                            <div class="row text-center right-heading">
                                <div class="col-md-3">
                                    <h5 class="text-red">{{ workersCount + 1000 }} + </h5>
                                    <p>{{$t("helper_title")}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-blue">{{ agencyCount + 100 }} + </h5>
                                    <p>{{$t("agency_title")}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ employerCount + 100}} + </h5>
                                    <p>{{$t("employer_title")}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="started-row">
                        <div class="row row-wrapper">
                            <div class="col-lg-6 col-md-12  col-12 pl-5">
                                <router-link :to="{name: 'want_mery'}" class='custom-link'>
                                <div class="media media-custom left-side">
                                        <span>
                                             <img alt="want mery" class="align-self-start mr-3"
                                                  src="../assets/img/helper.png" style="padding-left: 4px;" width="100">
                                        </span>
                                    <div class="media-body">
                                        <h4 class="desktop-header">{{$t("need_mery_home")}}</h4>
                                        <h4 class="mobile-header">
                                           {{$t("need_mery_sub")}}
                                        </h4>
                                        <small>{{$t("need_mery_bottom")}}</small>
                                    </div>
                                </div>
                                </router-link>
                                <div class="media-btn">
                                    <router-link :to="{name: 'want_mery'}" class="btn btn-find btn-danger--custom">{{$t("mery_member")}}</router-link>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-12 pl-5">
                                <router-link :to="{name: 'want_mery'}" class='custom-link'>
                                <div class="media media-custom right-side">
                                        <span>
                                             <img alt="want mery" class="align-self-start mr-3 img--2"
                                                  src="../assets/img/employer.png" style="padding-left: 4px;" width="100">
                                        </span>
                                    <div class="media-body media-body--2">
                                        <h4 class="desktop-header">{{$t("work_mery")}}</h4>
                                        <h4 class="mobile-header">
                                            {{$t("want_mery_member")}}
                                        </h4>
                                        <small>{{$t("start_you")}}</small>
                                    </div>
                                </div>
                                </router-link>
                                <div class="media-btn">
                                    <router-link :to="{name: 'want_mery'}" class="btn btn-find btn-primary--custom">{{$t("with_mery")}}</router-link>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <Best />

        </header>
    </div>
</template>

<script>

    import axios from 'axios';
    import Best from '../components/Best';

    export default {
        name: 'Home',
        components: {Best},

        data() {
            return {
                workersCount: null,
                agencyCount: null,
                employerCount: null,
                error: null,
            };
        },
        mounted: function() {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {
            this.fetchWorkerCount();
            this.fetchAgencyCount();
            this.fetchEmployerCount();
        },
        methods: {
            fetchWorkerCount() {
                this.error = this.workersCount = null;
                axios
                    .get('api/worker/count')
                    .then(response => {
                        this.workersCount = response.data.data
                    });
            },
            fetchAgencyCount() {
                this.error = this.agencyCount = null;
                axios
                    .get('api/agency/count')
                    .then(response => {
                        this.agencyCount = response.data.data
                    });
            },
            fetchEmployerCount() {
                this.error = this.employerCount = null;
                axios
                    .get('api/employer/count')
                    .then(response => {
                        this.employerCount = response.data.data
                    });
            },
        }


    }
</script>

