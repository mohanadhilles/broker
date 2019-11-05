<template>
    <div>

        <!--Page Footer-->
        <footer id="page-footer">
    <span class="up-arrow">
        <a href="#up"><img alt="up" src="../assets/img/upArrow.png"></a>
    </span>

            <span class="logo-wrapper">
    </span>
            <section class="main-footer footer-modified">
                <div class="container">
                    <div class="row flex-row">
                        <div class="col-lg-5 col-md-12 footer-section footer-section--2">
                            <div class="app">
                                <img alt="app store btn" class="app-btn" src="../assets/img/ios.png">
                            </div>
                            <div class="app">
                                <img alt="google play btn" class="app-btn" src="../assets/img/android.png">
                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 footer-section">
                            <h6 class="list-heading">{{$t("footer.logo")}}</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <router-link :to="{name: 'about'}" class="nav-link--footer">{{$t("about.title")}}</router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'terms_condition'}" class="nav-link--footer">{{$t("term.title")}}</router-link>
                                </li>
                            </ul>

                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 footer-section">
                            <h6 class="list-heading">{{$t("footer.get_help")}}</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <router-link :to="{name: 'privacy_policy'}" class="nav-link--footer">{{$t("privacy.title")}}</router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'contactUs'}" class="nav-link--footer">{{$t("nav.contact")}}</router-link>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 footer-section">
                            <h6 class="list-heading">{{$t("footer.discover")}}</h6>
<!--                            <ul class="list-unstyled">-->

<!--                                <li>-->
<!--                                    <a class="nav-link&#45;&#45;footer" href="#">{{$t("footer.home_play")}}</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a class="nav-link&#45;&#45;footer" href="#">{{$t("footer.list_your")}}</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a class="nav-link&#45;&#45;footer" href="#">{{$t("footer.care")}}</a>-->
<!--                                </li>-->
<!--                            </ul>-->

                        </div>
                    </div>
                </div>
            </section>

            <section v-if="isSettgings" class="copyright">
                <div class="container">
                    <div class="d-flex justify-content-between copyright--flex">
                        <div class="date"> &copy;
                            {{ new Date().getFullYear() }} {{$t("footer.copy")}}
                        </div>

                        <div class="footer-social">
                            <a target="_blank" :href="settings.fb"><i class="fab fa-facebook-square subscribe-icon"></i></a>
                            <a target="_blank" :href="settings.tw"><i class="fab fa-twitter subscribe-icon"></i></a>
                            <a target="_blank" :href="settings.ln"><i class="fab fa-linkedin-in subscribe-icon"></i></a>
                            <a target="_blank" :href="settings.yt"><i class="fab fa-youtube subscribe-icon"></i></a>

                        </div>

                    </div>
                </div>
            </section>

        </footer>

    </div>


</template>


<script>

    export  default  {
        name: 'Footer',

        data: function () {
            return {
                isSettgings : this.checkIfSettings(),
                settings: JSON.parse(localStorage.getItem('settings')),
            }
        },
        created: function () {
            this.settings = JSON.parse(localStorage.getItem('settings'));
            this.checkIfSettings();
        },
        methods: {
            checkIfSettings() {
                let token = localStorage.getItem('settings');
                return !!token;
            }
        }
    }

</script>
<style scoped>
    .date{
        margin-left: 15%;
    }
</style>
