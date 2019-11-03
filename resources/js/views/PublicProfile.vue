<template>
    <div>
        <Section></Section>
        <div class="container top-head">
            <div class="row header-wrap">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li aria-current="page" class="breadcrumb-item">
                            <router-link :to="{name: 'mery_filter'}" class="custom-link">
                                <i class="fas fa-chevron-left back-icon"></i>
                                <span class="paginate-header"> {{$t("back")}} </span>
                            </router-link>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <main id="page-content">
            <section class="public-profile" id="profile-section">
                <div class="container">
                    <h2 class="main-heading">
                       {{$t("profile.title")}}
                    </h2>
                    <div class="line"></div>
                    <div v-if="loaded" class="row">
                        <div class="col-12">
                            <div class="media">
                            <span class="pic-wrapper">
                                <img alt="want mery" width="120" class="align-self-start profile-picture img-responsive rounded-circle"
                                     :src="user.imgUrl">
                            </span>
                                <div class="media-body media-info">
                                    <h4 class="pt-2 profile-id" style="line-height:.9;">{{ user.code }}, {{ user.age}} <i>{{$t("years")}}</i></h4>
                                    <img alt="place icon" class="location-icon" src="/images/place.png">
                                    <span class="location">{{ user.countries.title }}</span>
                                    <div class="profile-stars d-flex">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="hire">
                                        <h3 class="profile-about status">{{ user.status == 0 ? 'UnAvailable' : 'Available' }}</h3>
                                        <router-link  v-if="auth.role == 3 || auth.role == 4" :to="{name:'chat', params:  { id: user.id }}" class="btn btn-danger--custom">{{$t("chat.start")}}</router-link>
                                    </div>

                                </div>
                            </div>

                            <!--========= profile Information ===========-->
                            <div class="public-info">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.name")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.name }}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.email")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.email }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                             {{$t("profile.date_birth")}}
                                            </div>
                                            <div class="info-value">
                                                <data value="NaN">{{ user.date_of_birth }}</data>
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                              {{$t("profile.passport")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.passport }}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.marital")}}
                                            </div>
                                            <div class="info-value">
                                                single
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                                Gender
                                            </div>
                                            <div class="info-value">
                                                Female
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                                Mobile
                                            </div>
                                            <div class="info-value">
                                                <!--<span class="country-code">+966</span>-->
                                                {{ user.phone }}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                              {{$t("profile.salary")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.salary}}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.weight")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.weight}}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.height")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.height}}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                                {{$t("profile.whatsapp")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.whats_app}}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                                {{$t("profile.fb")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.facebook}}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.yt")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.youtube}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.edu")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.education.title }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.very_passport")}}
                                            </div>
                                            <div class="info-value">
                                               {{$t("profile.saudi")}}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.exp_passport")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.passport_date_of_exp }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                              {{$t("profile.issue_passport")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.passport_date_of_issue }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                              {{$t("profile.valid_visa")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.exp_visa }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.available")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.available_at }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.current")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.country }}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                                {{$t("profile.rel")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.religion.title }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.child")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.no_of_child }}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                                {{$t("profile.arabic")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.arabic_lang.title }}
                                            </div>
                                        </div>
                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.english")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.english_lang.title }}
                                            </div>
                                        </div>

                                        <div class="label-group row">
                                            <div class="info-label">
                                               {{$t("profile.bio")}}
                                            </div>
                                            <div class="info-value">
                                                {{ user.bio }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>
</template>
<script>

    import axios from 'axios';
    import Section from '../components/Section'
    export default {
        name: 'PublicProfile',
        components:{Section},
        data: function() {
            return {
                loaded: true,
                user: null,
                auth: null,
            }
        },
        mounted: function() {
            document.getElementById('top-nav').style.display = 'block';
        },
        created: function () {
            this.getUser();
            this.getCurrent();
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

            getUser() {
                axios.get('/api/employer/worker/'+ this.$route.params.id,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(
                    res => {
                        this.loaded = true;
                        this.user = res.data.data;
                    }
                ).catch(error => {
                    this.allerros = error.response.data.date;
                })
            }
        }
    }
</script>
<style scoped>
    .line{
        margin: 0 1.5rem 1.5rem 0; width: 7rem;
    }
</style>
