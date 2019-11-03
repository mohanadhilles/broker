<template>
    <div>
        <Section></Section>
        <section id="job-details">
            <div class="container">
                <div class="row header-wrap mt-5">
                    <breadcrumb></breadcrumb>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <h2 class="job-details">
                              {{$t("details.title")}}
                            </h2>
                            <div class="line--1 mb-5"></div>
                        </div>
                        <div class="all pl-lg-5 pl-md-5 pl-sm-5 pl-0 pb-4">
                            <p class="time"></p>
                            <div class="media">
                                <img :src="user.imgUrl" class="mr-3" alt="..." width="100px" >
                                <div class="media-body">
                                    <h5 class="mt-0 title">{{$t("details.sub")}}</h5>
                                </div>
                            </div>
                            <p class="w-75 width">
                                Welcome To mery for Pink color's house worker social network this job
                                created by {{user.name}}
                                From {{countries.title}} wanted house worker age {{job_details.age}} work as
                                {{job_details.type.title}}
                            </p>
                            <div class="section mt-4">
                                <div class="d-inline-block text-center">
                                    <p class="typeOfJob">{{$t("details.type")}}</p>
                                    <p class="titleJob">{{job_details.type.title}}</p>
                                </div>
                                <div class="right-line d-inline-block "></div>
                                <div class="d-inline-block text-center">
                                    <p>{{$t("details.place")}}</p>
                                    <p class="titleJob">{{job_details.place_size}}M </p>
                                </div>
                                <div class="right-line d-inline-block "></div>

                                <div class="d-inline-block text-center">
                                    <p>{{$t("details.place_type")}}</p>
                                    <p class="titleJob">{{place.title}}</p>
                                </div>
                            </div>

                            <div class="section mt-4">
                                <div class="d-inline-block text-center">
                                    <p>{{$t("details.bedroom")}}</p>
                                    <p class="titleJob">{{job_details.bed_rooms}}</p>
                                </div>
                                <div class="right-line d-inline-block"></div>
                                <div class="d-inline-block text-center">
                                    <p>{{$t("details.wanted")}}</p>
                                    <p class="titleJob">Date: {{job_details.wanted_at}}</p>
                                </div>
                                <div class="right-line d-inline-block"></div>
                                <div class="d-inline-block text-center">
                                    <p>{{$t("details.child")}}</p>
                                    <p class="titleJob">{{job_details.child_no}}</p>
                                </div>
                            </div>
                            <div class="section3 mt-3">
                                <p class="d-inline-block  ml-4">{{$t("details.salary")}}</p>
                                <p class="d-inline-block mr-4 rs">{{job_details.salary}} / {{$t("details.month")}}</p>
                            </div>
                            <div class="mt-4">
                                <p class="created">{{$t("details.created")}}</p>
                                <p class="name">{{user.name}}</p>
                                <div>
                                    <i class="fas fa-map-marker-alt d-inline-block pr-2 map"></i>
                                    <p class="location d-inline-block">{{countries.title}}</p>
                                </div>

                                <button v-if="auth.role == 2" type="submit" :class="{'disabled': user.id == accepts.worker_id}"  @click.prevent="accept"  class=" btn btn-danger--custom applyJob">{{$t("details.apply")}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="job-applied">

                    <!--========= Table Header ==========-->
                    <div class="content-wrapper">
                        <div class="row row-header">
                            <div class="col-lg-3 col-3">
                                <p class="job-head text-center">{{$t("details.name")}}</p>
                            </div>

                            <div class="col-lg-3 col-3">
                                <p class="job-head text-center">{{$t("details.code")}}</p>
                            </div>

                            <div class="col-lg-3 col-3">
                                <p class="job-head text-center">{{$t("profile.hire")}}</p>
                            </div>
                            <div class="col-lg-3 col-3">
                                <p class="job-head text-center">{{$t("more")}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!--========= Table Content ==========-->
                    <div class="content-wrapper">
                        <div class="row content-wrapper--1 text-center" v-for="accs of accepts">
                            <div class="col-lg-3 col-3">
                                <p class="job-title">{{accs.acc.name}}</p>
                            </div>
                            <div class="col-lg-3 col-3">
                                <p class="job-content">{{accs.acc.code}}</p>
                            </div>

                            <div class="col-lg-3 col-3" >
                                <a  @click.prevent="tracking(accs.id, accs.acc.id)" class="btn btn-danger--custom hire-me-btn">{{$t("profile.hire")}}</a>
                            </div>
                            <div class="col-lg-3 col-3">
                                <router-link :to="{ name: 'public_profile', params:{id: accs.worker_id}  }" class="more">
                                    View<img alt="arrow" src="../../assets/img/rihgtArrow.png"></router-link>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </section>
    </div>
</template>
<script>
    import axios from 'axios';
    import Section from "../../components/Section";
    import Breadcrumb from "../../components/Breadcrumb";

    export default {
        name: 'JobDetails',
        components: {Section,Breadcrumb},
        data() {
            return {
                job_details: '',
                user: '',
                allerros: [],
                id: '',
                accepts: [],
                countries: '',
                type: '',
                place: '',
                auth:null,
            }
        },
        created: function() {
            this.getDetails();
            this.getCurrent();
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },

        methods: {
            getCurrent() {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.auth = res.data;
                })
            },
            getDetails() {
                axios.get('/api/worker/job/' + this.$route.params.id, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.loaded = true;
                    this.job_details = res.data.data;
                    console.log(this.job_details);
                    this.user = res.data.data.user;
                    this.countries = res.data.data.country;
                    this.place = res.data.data.place;
                    this.type = res.data.data.type;
                    this.accepts = res.data.message.original.data;
                }).catch(error => {
                    this.allerros = error.response.data.date;

                });
            },
            accept() {
                axios.post('/api/worker/accept/', {
                    id: this.job_details.id,
                },{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(
                    res => {
                        localStorage.setItem('user', JSON.stringify(res.data.data));
                        this.allerros = [];
                        this.$notify({
                            group: 'foo',
                            title: 'Success',
                            text: 'updated successfully',
                            width: 500,
                            position: 'top right',
                            type: 'success'
                        });

                }).catch(
                    err => {
                        this.$notify({
                            group: 'foo',
                            title: 'Failed',
                            text: 'updated failed',
                            width: 500,
                            position: 'top right',
                            type: 'error'
                        });
                        this.allerros = err.response.data.date;

                });

            },

            tracking(accept_id,helper_id) {
                axios.post('/api/track/', {
                    job_id: this.job_details.id,
                    accept_id: accept_id,
                    helper_id: helper_id
                },{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(
                    res => {
                        localStorage.setItem('user', JSON.stringify(res.data.data));
                        this.allerros = [];
                        this.$notify({
                            group: 'foo',
                            title: 'Success',
                            text: 'updated successfully',
                            width: 500,
                            position: 'top right',
                            type: 'success'
                        });

                    }).catch(
                    err => {
                        this.$notify({
                            group: 'foo',
                            title: 'Failed',
                            text: 'updated failed',
                            width: 500,
                            position: 'top right',
                            type: 'error'
                        });
                        this.allerros = err.response.data.date;

                    });

            },

        }
    }
</script>
<style scoped>
    .disabled{
        display: none;
    }
    .hire-me-btn{
        font-size: 0.90rem;
    }
</style>
