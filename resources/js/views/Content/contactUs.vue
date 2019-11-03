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
                        <div class="col-12 text-center">
                            <h2 class="main-heading pt-0">
                                Contact Us
                            </h2>
                            <div class="line mx-auto"></div>
                        </div>

                        <div class="col-12 text-center about-img contactImg">
                            <img alt="about us" src="../../assets/img/contact-img.png">
                        </div>

                        <div class="col-12 about-text">
                            <div class="about-pargraph">


                                <section class="resume contact">
                                    <div class="container">
                                        <form action="" class="resume-form" method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 mery-contact">
                                                    <div class="form-group row">
                                                        <label class="col-form-label">Name </label>
                                                        <div class="input-field">
                                                            <input class="form-control" name="name" required="" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label"> Mobile No. </label>
                                                        <div class="input-field">
                                                            <div class="d-flex">
                                                                <input class="form-control mobile-number" id="phoneNumber" placeholder="" v-model="settings.country.code" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label"> Email Address</label>
                                                        <div class="input-field">
                                                            <input class="form-control" name="email" required="" type="email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label">Messages</label>
                                                        <div class="input-field">
                                                            <textarea rows="5" cols="2" class="form-control" required></textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <button class="btn btn-danger--custom contactBtn" type="reset">Send</button>
                                        </form>
                                    </div>
                                </section>
                            </div>
                            <div class="col-12 social-icon contact-icon">
                                <h4 class="about-heading sub-heading contact-info">Contact Information</h4>
                                <a href="mailto:info@mery.com"><i class="fas fa-envelope subscribe-icon"></i><span>Info@mery.com</span></a>
                                <a href="https://www.mery.com"><i class="fas fa-desktop subscribe-icon"></i><span>https://www.mery.com</span></a>
                                <a href="#"><i class="fas fa-map-marker subscribe-icon"></i><span class="about-pargraph sub-pargraph">Saudi Arabia - Riyadh - Abdul Aziz Street PO Box 4565 </span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</template>

<script>

    import store from '../../store';
    import axios from 'axios';
    import Breadcrumb from "../../components/Breadcrumb";
    import Section from "../../components/Section";

    export default {
        name: 'contactUs',
        components: {Section,Breadcrumb},
        data: function () {
            return {
                settings: JSON.parse(localStorage.getItem('settings')),
                auth: null,
                user: null,
                authed: false,
            };
        },
        mounted: function() {
            document.getElementById('top-nav').style.display = 'block';
        },
        created: function () {
        },

        computed: {
        },
        methods: {

            },
    }
</script>

<style scoped>
    @media (max-width: 576px){
    .contactImg {
        display: none;
    }
    }
</style>


