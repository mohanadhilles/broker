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

                <section id="want-mery">
                    <div class="container">

                        <section class="need-mery" id="need-mery">
                            <div class="row custom-row mb-0">
                                <div class="col-lg-2 col-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li aria-current="page" class="breadcrumb-item">
                                                <router-link class="custom-link" style="left: 1rem;top:1rem" :to="{name: 'profile'}">
                                                    <i class="fas fa-chevron-left back-icon"></i>
                                                    <span class="paginate-header"> {{$t("profile.title")}} </span>
                                              </router-link>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-lg-10 col-12 need-mery-header">
                                    <h3 class="main-heading" style="margin-left: 16%">{{$t("need_mery.title")}}</h3>
                                    <div class="line" style="margin-left: 18%"></div>
                                </div>
                            </div>

                            <div class="mx-5 serv-row">
                                <div class="row row-wrapper row-wrapper--1">

                                    <div class="col-lg-4 col-12">
                                        <a class="now" @click.prevent="fullTime">
                                            <div class="option-wrapper">
                                                <img alt="right now" src="../../assets/img/now.png">
                                                <p>{{$t("need_mery.contract")}}</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <a href="#">
                                            <div class="option-wrapper">
                                                <img alt="right now" src="../../assets/img/week.png">
                                                <p>{{$t("need_mery.soon")}}</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <router-link :to="{name: 'mery_filter'}">
                                            <div class="option-wrapper">
                                                <img alt="right now" src="../../assets/img/browsing.png">
                                                <p>{{$t("see_all")}}</p>
                                            </div>
                                        </router-link>
                                    </div>

                                </div>
                            </div>
                        </section>
                        <section class="steps-slider" style="display:none;">
                            <div class="carousel slide" data-interval="false" data-ride="carousel" data-wrap="false"
                                 id="steps">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li aria-current="page" class="breadcrumb-item">
                                            <a class="carousel-control-prev carousel-prev custom-link" data-slide="prev"
                                               href="#steps" role="button"
                                               style="display:none;">
                                                <i class="fas fa-chevron-left back-icon"></i>
                                                <span aria-hidden="true" class="paginate-header"> {{$t("back")}} </span>
                                            </a>
                                        </li>
                                    </ol>
                                </nav>


                                <div class="carousel-inner">
                                    <div class="carousel-item active step-1 ">
                                        <a class="custom-link position-relative mt-4 back" href="#need-mery"
                                           role="button"
                                           style="left: 1rem;top:1rem">
                                            <i class="fas fa-chevron-left back-icon"></i>
                                            <span aria-hidden="true" class="paginate-header"> {{$t("back")}} </span>
                                        </a>
                                        <div class="text-center step-heading">
                                            <img alt="mery" src="../../assets/img/photo1.png"
                                                 style="width: 4rem; height: 4rem">
                                            <h2 class="step-header">
                                             {{$t("need_mery.sub")}}
                                            </h2>
                                            <p class="step-desc">
                                             {{$t("need_mery.sub_bottom")}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="mery-home">
                                            <img alt="mery" class="img-hide" src="../../assets/img/photo1.png"
                                                 style="width: 4rem; height: 4rem;display: none;">
                                            <h3 class="step-header--1">
                                               {{$t("need_mery.sub.bottom_again")}}
                                            </h3>
                                        </div>

                                        <div class="step-tracker">
                                            <div class="progress-bar-wrapper">
                                                <div class="step step-1 done"></div>
                                                <div class="bar"></div>
                                                <div class="step step-2"></div>
                                                <div class="bar"></div>
                                                <div class="step step-3"></div>
                                                <div class="bar"></div>
                                                <div class="step step-4"></div>
                                            </div>
                                        </div>

                                        <div class="form-wrapper form-step-1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4 col-12 txt-center">

                                                        <label for="inputSize">{{$t("need_mery.size")}}</label>
                                                        <div class="form-inline meters">
                                                            <input class="form-control" id="inputSize"
                                                                   placeholder="insert number"
                                                                   name="place_size"
                                                                   v-model="filter.place_size"
                                                                   type="text">
                                                            <span class="unit">{{$t("need_mery.meters")}}</span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label for="bed-room-number">{{$t("need_mery.bedroom")}}</label>
                                                        <div class="form-inline">
                                                            <a class="sub button" href="#"><i class="fas fa-minus"></i></a>
                                                            <input class="field" id="bed-room-number" name="bed_rooms"
                                                                   type="text"
                                                                   v-model="filter.bed_rooms"
                                                                   value="02"/>
                                                            <a class="add button" href="#"><i class="fas fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label for="child-num">{{$t("need_mery.child")}}</label>
                                                        <div class="form-inline">
                                                            <a class="sub button" href="#"><i class="fas fa-minus"></i></a>
                                                            <input class="field" id="child-num"
                                                                   v-model="filter.child_no" name="child_no" type="text"
                                                                   value="02"/>
                                                            <a class="add button" href="#"><i class="fas fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="mery-home">
                                            <img alt="mery tasks" src="../../assets/img/photo1.png"
                                                 style="width: 3rem;height: 3rem;">
                                            <span
                                                class="step-header--1">{{$t("need_mery.task")}}</span>
                                        </div>

                                        <div class="step-tracker">
                                            <div class="progress-bar-wrapper">
                                                <div class="step step-1 done"></div>
                                                <div class="bar"></div>
                                                <div class="step step-2 done" data-slide="prev" role="button"></div>
                                                <div class="bar"></div>
                                                <div class="step step-3"></div>
                                                <div class="bar"></div>
                                                <div class="step step-4"></div>
                                            </div>
                                        </div>

                                        <div class="form-wrapper form-step-1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4 col-12 txt-center">

                                                        <label for="inputSize">{{$t("need_mery.wanted")}} </label>
                                                        <input class="form-control" id="inputSize"
                                                               placeholder="insert number"
                                                               name="wanted_at"
                                                               v-model="filter.wanted_at"
                                                               type="date">

                                                    </div>
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label class="col-form-label" for="inputSize">{{$t("need_mery.type")}}</label>
                                                        <select class="form-control select-box-job" id="inputSize"
                                                                v-model="filter.job_type" name="job_type">
                                                            <option v-for="job_type in job_types"
                                                                    :value="job_type.id">{{ job_type.title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label for="child-num">{{$t("need_mery.salary")}}</label>
                                                        <div class="form-inline">
                                                            <input class="form-control" id="inputSize"
                                                                   placeholder="insert number"
                                                                   name="salary"
                                                                   v-model="filter.salary"
                                                                   type="text">
                                                            <span class="unit">$</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                    <div class="carousel-item">
                                        <div class="mery-home">
                                            <img alt="mery tasks" src="../../assets/img/photo1.png"
                                                 style="width: 3rem;height: 3rem;">
                                            <span
                                                class="step-header--1">{{$t("need_mery.sub_title")}}</span>
                                        </div>

                                        <div class="step-tracker">
                                            <div class="progress-bar-wrapper">
                                                <div class="step step-1 done"></div>
                                                <div class="bar"></div>
                                                <div class="step step-2 done" data-slide="prev" role="button"></div>
                                                <div class="bar"></div>
                                                <div class="step step-3"></div>
                                                <div class="bar"></div>
                                                <div class="step step-4"></div>
                                            </div>
                                        </div>

                                        <div class="form-wrapper form-step-1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label for="Country" class="col-form-label">{{$t("job.country")}}</label>
                                                        <model-list-select class="select form-control" id="Country"
                                                                           :list="countries"
                                                                           option-value="id"
                                                                           option-text="title"
                                                                           v-model="filter.country"
                                                                           placeholder="select country">
                                                        </model-list-select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label class="col-form-label" for="job_type">{{$t("details.place")}}</label>
                                                        <select class="form-control" id="job_type"
                                                                v-model="filter.place" name="place">
                                                            <option v-for="country in places"
                                                                    :value="country.id">{{ country.title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-12 txt-center">
                                                        <label class="col-form-label" for="child-num">{{$t("details.gender")}}</label>
                                                        <select class="form-control" id="child-num"
                                                                v-model="filter.gender" name="gender">
                                                            <option v-for="country in genders"
                                                                    :value="country.id">{{ country.title }}
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-12 text-center join-btn">
                                            <a class="btn btn-danger--custom" @click.prevent="find">{{$t("find")}}</a>
                                        </div>

                                    </div>

                                </div>
                                <a class="carousel-control-next carousel-next" data-slide="next" href="#steps"
                                   role="button">
                                    <span class="btn btn-danger--custom">{{$t("next")}}</span>
                                </a>
                            </div>
                        </section>
                    </div>

                </section>
            </div>
        </header>

        <Best/>

    </div>
</template>


<script>
    import Best from "../../components/Best";
    import axios from 'axios';
    import {ModelListSelect} from 'vue-search-select';
    export default {

        name: 'NeedFilter',
        components: {Best, ModelListSelect},

        data: function () {
            return {
                job_types: [],
                countries: [],
                places: [],
                genders: [
                    {id: 0, title: 'Male'},
                    {id: 1, title: 'Female'}
                ],
                filter: {
                    job_type: '',
                    wanted_at: null,
                    salary: '',
                    place_size: '',
                    place: '',
                    country: '',
                    bed_rooms: '01',
                    child_no: '01',
                    gender: '',

                },

                auth: localStorage.getItem('token')
            }
        },

        mounted: function () {
            require('../../assets/css/want_mery.css');
            document.getElementById('top-nav').style.display = 'block';
        },
        created: function () {
            this.getTypes();
            this.getCountries();
            this.getContract();
            this.getPlaces();


        },
        methods: {
            store(){
                axios.post('/api/employer/find',{
                    job_type: this.filter.job_type,
                    wanted_at: this.filter.wanted_at,
                    salary: this.filter.salary,
                    place_size: this.filter.place_size,
                    place: this.filter.place,
                    country: this.filter.country,
                    bed_rooms:this.filter.bed_rooms,
                    child_no: this.filter.child_no,
                    gender: this.filter.gender,
                },  {
                    headers: { Authorization: 'Bearer ' + localStorage.getItem('token') }
                }).then(
                    res => {
                        console.log(res)
            }).catch(error => {
                    this.allerros = error.response.data.date;
                })
            },
            find() {
                this.store();
                this.$router.push({name: 'mery_filter_results', query: {filter: this.filter}});

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
            getCountries() {
                axios.get('/api/worker/country', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.countries = _.values(res.data.data);

                })
            },
            getPlaces() {
                axios.get('/api/worker/places', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.places = res.data.data;
                })
            },

            getContract() {
                axios.get('/api/worker/contract', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.contracts = res.data.data;
                })
            },
            fullTime() {
                document.getElementById('need-mery').style.display = 'none';
                document.getElementsByClassName('steps-slider')[0].style.display = 'block';
            },
            back() {
                document.getElementById('need-mery').style.display = 'block';
                document.getElementsByClassName('steps-slider')[0].style.display = 'none';
            }
        }
    }
</script>

<style scope>
    .meters {
        margin-top: -8px;
    }

    #want-mery #steps #inputSize {
        border-radius: 0 !important;
    }

    #want-mery #steps #inputSize {
        width: 80%;
        border-color: #DBDBDB;
        border-radius: 1.5625rem;
        height: 3.125rem;
    }
    .select-box-job{
        margin-top: -12.5px;
    }

</style>



