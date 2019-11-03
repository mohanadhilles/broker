<template>
    <div>
        <Section></Section>
        <main id="page-content">
            <section class="posts-section filter-section">
                <div class="container job-header">
                    <div class="row header-wrap">
                      <breadcrumb></breadcrumb>
                    </div>
                    <h2 class="main-heading">
                        {{$t("job.title")}}
                    </h2>
                    <div class="line--1"></div>
                </div>
                <div class="search-bar filter-bar">
                    <div class="container bar--width">
                    </div>
                </div>

                <div class="container job-header bar--width">
                    <div class="row">
                        <div class="col-lg-3 col-12 aside-wrapper" v-if="filter_mode">
                            <aside class="filter-options ">
                                <form>
                                    <div class="form-group form-select">
                                        <label class="label-text" for="location">{{$t("job.country")}}</label>
                                        <select v-model="country_to_work" class="form-control" id="location">
                                            <option v-for="country of country_to_work" :value="country_to_work.title">
                                                {{country.title}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group form-select">
                                        <label class="label-text" for="salary">{{$t("details.salary")}}</label>
                                        <select v-model="salary" class="form-control" id="salary">
                                            <option v-for="job of jobs" :value="jobs.salary">{{ job.salary }} $ {{$t("job.month")}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group form-select">
                                        <label class="label-text" for="type">{{$t("job.skills")}}</label>
                                        <select v-model="job_types" class="form-control" id="type">
                                            <option v-for="skill of job_types" :value="job_types.title">{{ skill.title}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="line-hor"></div>
                                    <button class="btn btn-red btn-custom" value="Search">{{$t("send")}}</button>
                                    <button class="btn btn-default btn-custom"  type="reset">{{$t("reset")}}</button>
                                </form>
                            </aside>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div class="posts">
                                <div class="media job-wrapper" v-for="job of jobs">
                                    <img alt="..." width="80" class="mr-3" :src="job.user.imgUrl">
                                    <div class="media-body">
                                        <h5 class="job-title">{{job.type.title}}</h5>
                                        <img alt="place" src="../../assets/img/place-2.png"> <span class="job-location">{{job.country.title}}</span>
                                        <p class="job-duration">
                                            <span class="dur">{{job.wanted_at}}</span>{{job.salary}}
                                        </p>
                                        <p class="job-description">
                                           {{$t("job.contract")}} {{job.contract.title}} {{$t("job.place_as")}} {{job.place.title}} {{$t("job.from")}}
                                           {{$t("job.employer")}} {{ job.user.name}}
                                        </p>
                                    </div>

                                    <div class="post-time">
                                        <time>{{job.created_at}}</time>
                                    </div>

                                    <div class="align-self-end" v-if="user.role == 2">
                                        <router-link :to="{ name: 'JobDetails', params:{ id: job.id }  }" class="more">
                                            {{$t("more")}} <img alt="arrow" src="../../assets/img/rihgtArrow.png"></router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img v-if="loading" style="display: block; margin: auto" width="80" src="/mery/loading.gif" alt="">
                <div id="load" v-if="jobs.length > 7 " @click.prevent="loadMore">
                  {{$t("load")}}
                </div>
            </section>
        </main>
    </div>

</template>

<script>
    import axios from 'axios';
    import Section from "../../components/Section";
    import Breadcrumb from "../../components/Breadcrumb";

    export default {
        name: 'jobs_filter',
        components: {Breadcrumb, Section},

        data: function () {
            return {
                filter_mode: true,
                jobs: [],
                page: 1,
                loading: false,
                search_name: null,
                country_to_work: [],
                job_types: [],
                salary: [],
                user: null,

            }
        },

        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created: function () {
            this.getJobs();
            this.getCountries();
            this.getTypes();
            this.getCurrent();
        },
        methods: {
            getCurrent() {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.user = res.data;
                })
            },

            filterMode() {
                return this.filter_mode = !this.filter_mode;
            },

            loadMore() {
                this.loading = true;
                this.page = this.page + 1;
                axios.get(`api/worker/jobs?page=${this.page}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.jobs = [...this.jobs, ...res.data.data.data];
                    this.loading = false;
                })
            },

            getCountries() {
                axios.get('/api/worker/country', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.country_to_work = res.data.data;

                })
            },


            getTypes() {
                axios.get('/api/worker/job_type', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.job_types = res.data.data;
                })
            },

            getJobs() {
                axios.get(`api/worker/jobs?page=${this.page}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.jobs = res.data.data.data;
                })
            },
            searchByName() {
                axios.get(`api/worker/job/${this.search_name}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = res.data.data.data;
                })

            },

            filter() {
                axios.get(`api/worker/job/${this.country_to_work}/${this.salary}/${this.job_type}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = res.data.data.data;
                })
            },
            reset() {
                this.country_to_work = null;
                this.salary = null;
                this.job_type = null;
            }
        }

    };

</script>

<style scoped>
    #load {
        text-align: center;
        margin-top: 20px;
        margin-left: 40%;
        color: white;
        font-size: 18px;
        cursor: pointer;
        width: 160px;
        height: 50px;
        line-height: 50px;
        background: #eb3f66;
        border-radius: 2px;
    }

    .filter-bar {
        display: none;
    }

    @media (max-width: 576px) {
        #load {
           margin-left: 25%;
        }
    }
</style>

