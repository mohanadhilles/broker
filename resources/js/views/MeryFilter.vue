<template>
    <div>
        <Section></Section>
        <main id="page-content">
            <section class="posts-section find-mery">
                <div class="container job-header">
                    <h2 class="job-posts">
                       {{$t("find")}}
                    </h2>
                    <div class="line--1"></div>
                </div>
                <!--========  Search bar  =========-->
                <div class="search-bar">
                    <div class="container bar--width">
                        <div class="form-group form-group--custom">
                            <div class="input-group">
                                <div class="input-group-prepend search-text">
                                    <div class="input-group-text inp-l">
                                        <span class="left-text">{{$t("search")}}</span>
                                    </div>
                                </div>
                                <input class="form-control search-input" v-model="search_name" id="search"
                                       placeholder="mery, house heeping …."
                                       type="text">

                                <div class="input-group-prepend prepend-width">
                                    <div class="input-group-text  filter-box"
                                         v-bind:class="{'toggle-color': filter_mode}">
                                        <a @click.prevent="filterMode" class="custom-link" id="filter-link">
                                            <img alt="filter" class="filter-icon" src="../assets/img/filter.png"
                                                 v-if="!filter_mode">
                                            <img alt="filter" class="filter-icon" src="../assets/img/filter-icon.png"
                                                 v-if="filter_mode">
                                            <span class="right-text">{{$t("filter")}}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="ver-line">&nbsp</div>

                                <div class="btn btn-search">
                                    <a @click.prevent="searchByName" class="btn-text">{{$t("search")}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--========  job post  =========-->
                <div class="container job-header bar--width">
                    <div class="row">
                        <div class="col-lg-3 col-12 aside-wrapper" v-if="filter_mode">
                            <aside class="filter-options">
                                <form>
                                    <div class="form-group form-select">
                                        <label class="label-text" for="location">{{$t("profile.country")}}</label>
                                        <select v-model="country_to_work" class="form-control" id="location"
                                                name="country_to_work">
                                            <option v-for="country of countries" :value="country.title">{{ country.title
                                                }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group form-select">
                                        <label class="label-text">{{$t("profile.nation")}}</label>
                                        <select v-model="nationality" class="form-control" name="location">
                                            <option v-for="country of countries" :value="country.title">{{ country.title}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group form-select">
                                        <label class="label-text">{{$t("profile.salary")}}</label>
                                        <div class="input-field">
                                            <input v-model="salary" class="form-control" name="salary"
                                                   type="text">
                                        </div>
                                    </div>

                                    <div class="form-group form-select">
                                        <label class="label-text">{{$t("profile.type")}}</label>
                                        <select v-model="job_type" class="form-control" name="job_type">
                                            <option v-for="job of job_types" :value="job.title">{{ job.title }}</option>
                                        </select>
                                    </div>
                                    <div class="line-hor"></div>


                                    <input @click.prevent="filter" class="btn btn-red btn-custom" type="submit"
                                           value="Search">
                                    <input @click.prevent="reset" class="btn btn-default btn-custom" type="reset"
                                           value="Reset">
                                </form>
                            </aside>
                        </div>

                        <div class=" col-12 mery-wrapper" v-bind:class="{ 'col-lg-9': filter_mode }">
                            <div class="posts ">
                                <div v-for="mery of merys" class="media job-wrapper "
                                     v-bind:class="{'job-width': filter_mode}">
                                    <img width="70" alt="..." class="mr-3 img-responsive rounded-circle"
                                         :src="mery.imgUrl">
                                    <div class="media-body">
                                        <h5 class="job-title"><a class="custom-link" href="#">{{mery.name }}</a>
                                        </h5>
                                        <img alt="place" src="../assets/img/place-2.png"> <span class="job-location">{{ mery.nationality.title }}</span>
                                        <p class="job-duration">
                                            <span class="dur">{{mery.salary}} ${{$t("details.month")}}</span>
                                        </p>
                                        <p class="job-description"> {{ mery.bio }}</p>
                                    </div>

                                    <div class="post-time">
                                        <span :class="['mery-stauts',mery.status == 0 ? 'offline' : 'online']">{{ mery.status == 0 ? 'offline' : 'online' }} <i class="fas fa-circle"></i></span>
                                    </div>

                                    <div class="align-self-end">
                                        <router-link :to="{ name: 'public_profile', params:  { id: mery.id }  }"
                                                     class="more">{{$t('more')}}<img alt="arrow"
                                                                                 src="../assets/img/rihgtArrow.png">
                                        </router-link>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <img v-if="loading" style="display: block; margin: auto" width="80" src="/mery/loading.gif" alt="">
                <div id="load" v-if="merys.length > 7 " @click.prevent="loadMore">
                    Load More
                </div>

            </section>
        </main>


    </div>
</template>


<script>
    import axios from 'axios';
    import Section from "../components/Section";

    export default {

        name: 'MeryFilter',
        components: {Section},
        data() {
            return {
                filter_mode: true,
                merys: [],
                page: 1,
                loading: false,
                countries: [],
                job_types: [],
                search_name: null,
                country_to_work: null,
                job_type: null,
                salary: null,
                nationality: null

            };
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created() {
            this.getMerys();
            this.getCountries();
            this.getTypes();
        },
        methods: {
            getCountries() {
                axios.get('/api/worker/country', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.countries = res.data.data;

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

            filterMode() {
                return this.filter_mode = !this.filter_mode;
            },
            getMerys() {
                axios.get(`api/worker?page=${this.page}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = res.data.data.data;
                })
            },
            loadMore() {
                this.loading = true;
                this.page = this.page + 1;
                axios.get(`api/worker?page=${this.page}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = [...this.merys, ...res.data.data.data];
                    this.loading = false;
                })
            },
            searchByName() {
                axios.get(`api/employer/filters/${this.search_name}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = res.data.data.data;
                })
            },
            filter() {
                axios.get(`api/employer/filter/${this.country_to_work}/${this.nationality}/${this.job_type}/${this.salary}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = res.data.data.data;
                })
            },
            reset() {
                this.nationality = null;
                this.country_to_work = null;
                this.salary = null;
                this.job_type = null;
            }
        },

    }
</script>

<style scoped>
    #load {
        text-align: center;
        margin-top: 20px;
        margin-left: 45%;
        color: white;
        font-size: 18px;
        cursor: pointer;
        width: 160px;
        height: 50px;
        line-height: 50px;
        background: #eb3f66;
        border-radius: 2px;
    }
</style>
