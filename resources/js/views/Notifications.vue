<template>
    <div>
        <Section></Section>
        <main id="page-content">
            <section id="notification">
                <div class="container notification-container">
                    <div class="row header-wrap">
                        <breadcrumb></breadcrumb>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="main-heading">{{$t("notify.title")}}</h2>
                            <div class="line--1"></div>
                            <ul class="nav nav-pills navigation mb-3 mt-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a aria-controls="pills-home" aria-selected="true"
                                       class="nav-link ml-4 activities active"
                                       data-toggle="pill" href="#pills-home" id="pills-home-tab"
                                       role="tab">{{$t("notify.sub")}}</a>
                                </li>
                                <div class="righ-line my-auto ml-4"></div>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="pills-home"
                                     role="tabpanel">
                                    <div class="media" v-for="notification of  notifications">
                                        <img alt="..." width="80" class="mr-3" :src="notification.user.imgUrl">
                                        <div class="media-body">
                                            <h5 class="mt-0 mery-heba">@{{notification.user.name}}</h5>
                                            <p class="age">{{notification.created_at}}</p>
                                            <p class="paragraph">{{notification.user.name}} - {{ notification.title}}</p>
                                            <p class="paragraph">{{$t("notify.hire")}} {{notification.country.title}} {{$t("notify.as")}}
                                                {{notification.job_type.title}}</p>
                                        </div>
                                        <div>
                                            <router-link v-if="notification.user.role == 2"
                                                :to="{ name: 'JobDetails', params:{ id: notification.job.id }  }"
                                                class="more">
                                               {{$t("more")}}<img alt="arrow" src="../assets/img/rihgtArrow.png">
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <img v-if="loading" style="display: block; margin: auto" width="80" src="/mery/loading.gif" alt="">
                <div id="load" v-if="notifications.length > 7 " @click.prevent="loadMore">
                   {{$t("load")}}
                </div>
            </section>

        </main>
    </div>
</template>


<script>

    import axios from 'axios';
    import Section from "../components/Section";
    import Breadcrumb from "../components/Breadcrumb";
    import Pusher from 'pusher-js';
    import Echo from 'laravel-echo';
    export default {
        name: 'Notificationss',
        components: {Section,Breadcrumb},
        data: function () {
            return {
                notifications: [],
                loading: false,
            }
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
            this.listenForChanges()
        },
        created: function () {
            this.getNotifications();
            this.getCurrent();
            this.listenForChanges();

        },
        methods: {
            listenForChanges() {
                Echo.channel('mery')
                    .listen('mery', message => {
                        if (!('Notification' in window)) {
                            alert('Web Notification is not supported');
                            return;
                        }

                        Notification.requestPermission(permission => {
                            let notification = new Notification('New post alert!', {
                                body: message, // content for the alert
                                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                            });

                            // link to page on clicking the notification
                            notification.onclick = () => {
                                window.open(window.location.href);
                            };
                        });
                    })
            },

            getCurrent() {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.user = res.data;
                })
            },
            loadMore() {
                this.loading = true;
                this.page = this.page + 1;
                axios.get(`api/worker/notification?page=${this.page}`, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.notifications = [...this.notifications, ...res.data.data.data];
                    this.loading = false;
                })
            },
            getNotifications() {
                axios.get('api/worker/notification', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.notifications = res.data.data.data;
                    console.log(this.notifications);
                })
            }
        }
    }
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

    #notification .media {
        padding: 1.5% !important;
    }

    #notification .navigation {
        height: 73px;
    }

    @media (min-width: 576px) {
        .notification-container {
            margin-top: 1%;
        }
        #load {
            margin-left: 25%;
        }
    }
    .main-heading {
        text-align: center;
        font-size: 1.5rem;
    }

</style>



