<template>
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
                                <h2>{{$t("sub_title")}}.</h2>
                                <p>{{$t("sub_title_bottom")}}</p>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item carousel-item--custom">
                        <div class="carousel-caption carousel-caption--custom img-slide">
                            <!-- Header caption -->
                            <section class="header-text">
                                <h1>{{$t("title")}}</h1>
                                <h2>{{$t("title")}}</h2>
                                <p>{{$t("sub_title_bottom")}}</p>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item carousel-item--custom">
                        <div class="carousel-caption carousel-caption--custom img-slide">
                            <!-- Header caption -->
                            <section class="header-text">
                                <h1>{{$t("title")}}</h1>
                                <h2>{{$t("title")}}</h2>
                                <p>{{$t("sub_title_bottom")}}</p>
                            </section>
                        </div>
                    </div>
                </div>

            </div>

            <!--========= Services section =========-->
            <section id="services-section">
                <div class="row header-row">
                    <div class="col-12 text-center">
                        <h3 class="main-heading">{{$t("section.title")}}</h3>
                        <div class="line"></div>
                    </div>
                </div>


                <div class="services-row">
                    <div class="row row-wrapper">
                        <div class="col-4 col-custom--1">
                            <router-link :to="{name: 'profile'}">
                                <div class="media media-custom">
                                <span>
                                    <img alt="want mery" class="align-self-start media-img"
                                         src="../assets/img/profile.png">
                                </span>
                                    <div class="media-body">
                                        <h4>{{$t("profile.title")}}</h4>
                                    </div>
                                </div>
                            </router-link>
                        </div>

                        <div class="col-4 col-custom--1">
                            <router-link :to="{name: 'jobs_filter'}">
                                <div class="media media-custom">
                                <span>
                                    <img alt="want mery" class="align-self-start media-img"
                                         src="../assets/img/job-posts.png">
                                </span>
                                    <div class="media-body">
                                        <h4>{{$t("job.title")}}</h4>
                                    </div>
                                </div>
                            </router-link>
                        </div>

                        <div class="col-4 col-custom--1">
                            <router-link :to="{name: 'notifications'}">
                                <div class="media media-custom">
                                <span>
                                    <img alt="want mery" class="align-self-start media-img"
                                         src="../assets/img/notification.png">
                                </span>
                                    <div class="media-body">
                                        <h4>{{$t("notify.title")}}</h4>
                                    </div>
                                </div>
                            </router-link>
                        </div>

                        <div class="col-4 col-custom col-custom-1">
                            <router-link :to="{name: 'chat_view'}">
                                <div class="media media-custom">
                                <span>
                                    <img alt="want mery" class="align-self-start media-img"
                                         src="../assets/img/message.png">
                                </span>
                                    <div class="media-body">
                                        <h4>{{$t("chat.title")}}</h4>
                                    </div>
                                </div>
                            </router-link>
                        </div>


                        <div class="col-4 col-custom col-custom--3">
                            <router-link :to="{name: 'Tracking'}">
                                <div class="media media-custom">
                                <span>
                                    <img alt="want mery" class="align-self-start media-img"
                                         src="../assets/img/job.png">
                                </span>
                                    <div class="media-body">
                                        <h4>{{$t("track.title")}}</h4>
                                    </div>
                                </div>
                            </router-link>
                        </div>

                            <div class="col-4 col-custom">
                                <router-link :to="{name: 'contactUs'}">
                                    <div class="media media-custom">
                                <span>
                                    <img alt="want mery" class="align-self-start media-img"
                                         src="../assets/img/support.png">
                                </span>
                                        <div class="media-body">
                                            <h4>{{$t("support.title")}}</h4>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                    </div>
                </div>
            </section>

        </div>
    </header>
</template>


<script>

    export default {

        name: 'Section',
    }
</script>
ipt>
