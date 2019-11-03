<template>
    <div>
        <main id="page-content">
            <section class="about-us">
                <div class="container">
                    <div class="row about-header">
                        <nav aria-label="breadcrumb" style="z-index: 12">
                            <ol class="breadcrumb">
                                <li aria-current="page" class="breadcrumb-item">
                                    <router-link :to="{name: 'home'}" class="custom-link">
                                        <i class="fas fa-chevron-left back-icon"></i>
                                        <span class="paginate-header"> Back </span>
                                    </router-link>
                                </li>
                            </ol>
                        </nav>

                        <div class="col-12 text-center">
                            <h2 class="main-heading pt-0">
                                Refund Cancellation Policy
                            </h2>
                            <div class="line mx-auto"></div>
                        </div>

                        <div class="col-12 text-center about-img">
                            <img alt="about us" src="../../assets/img/about-img.png">
                        </div>

                        <div class="col-12 about-text">
                            <h3 class="about-heading"> Refund Cancellation Policy</h3>

                            <p class="about-pargraph" v-html="content.refund_cancellation_policy"></p>

                            <h4 class="about-heading sub-heading">address</h4>
                            <p v-if="settings" class="about-pargraph sub-pargraph">{{ settings.address }} </p>

                            <div v-if="settings" class="col-12 social-icon">
                                <a target="_blank" :href="settings.fb"><i class="fab fa-facebook-square subscribe-icon"></i></a>
                                <a target="_blank" :href="settings.tw"><i class="fab fa-twitter subscribe-icon"></i></a>
                                <a target="_blank" :href="settings.ln"><i class="fab fa-linkedin-in subscribe-icon"></i></a>
                                <a target="_blank" :href="settings.yt"><i class="fab fa-youtube subscribe-icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>


    </div>
</template>



<script>
    import Section from '../../components/Section';
    import axios from 'axios';
    export default {
        name: 'Refund_Cancellation_Policy',
        components: {Section},

        data () {
            return {
                settings: JSON.parse(localStorage.getItem('settings')),
                content:'here Refund_Cancellation_Policy',
            }
        },
        created(){
            this.refundCancellation()
        },
        mounted: function() {
            document.getElementById('top-nav').style.display = 'block';
        },

        methods:{
            refundCancellation(){
                axios.get('/api/Content', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.content = res.data.data;
                });
            },
        },

    }
</script>
<style scoped>
    .about-us{
        margin-top: 10%;
    }
</style>
