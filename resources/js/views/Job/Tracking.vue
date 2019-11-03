<template>
    <div>
        <Section></Section>
        <main class="payment-page" id="page-content">
            <div class="container top-head">
                <div class="row header-wrap">
                   <breadcrumb></breadcrumb>
                </div>
                <div class="heading-wrapper">
                    <h2 class="main-heading main-heading--1 text-center" id="page-heading">
                        {{$t("track.sub")}} {{code_job}}
                    </h2>
                    <div class="col-12 text-center about-img contactImg">
                        <img alt="about us" src="../../assets/img/mery-newpng.png">
                    </div>
                    <div class="line divition-line"></div>
                </div>
                <div class="page-header d-flex">
                    <div class="paginate-number">
                        <ol class="progressbar">
                          <li v-for="count of counts" :class="{'active': track_case == count.id}">{{count.title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="btn btn-save">
                <button class="btn btn-danger--custom" type="submit">{{$t("refresh")}}</button>
            </div>
        </main>
    </div>
</template>
<script>
    import Section from "../../components/Section";
    import axios    from 'axios'
    import Breadcrumb from "../../components/Breadcrumb";
    export default {
        name: "Tracking",
        components: {Section,Breadcrumb},
        data: function () {
            return {
                counts: [],
                track_case: '',
                code_job: '',
            }
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        methods: {
            getTrackCase:function(){
                axios.get('api/track-case',{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res=>{
                    this.counts = res.data.data;
                });
            },
            getTrack:function () {
                axios.get('api/track',{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res=>{
                    this.case = res.data.data
                    this.code_job = res.data.data.accepts.code
                    this.track_case = res.data.data.track_case_id
                })
            }

        },
        created() {
            this.getTrackCase()
            this.getTrack()
        },

    }

</script>

<style scoped>
    .progressbar {
        counter-reset: step;
    }

    .progressbar li {
        list-style-type: none;
        width: 10%;
        float: left;
        font-size: 12px;
        position: relative;
        text-align: center;
        text-transform: uppercase;
        color: #7d7d7d;
    }

    .progressbar li:before {
        width: 50px;
        height: 50px;
        content: counter(step);
        counter-increment: step;
        line-height: 50px;
        border: 2px solid #eb3f66;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        border-radius: 50%;
        background-color: white;
    }

    .progressbar li:after {
        width: 100%;
        height: 2px;
        content: '';
        position: absolute;
        background-color: #7d7d7d;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressbar li:first-child:after {
        content: none;
    }

    .progressbar li.active {
        color: #eb3f66;
    }

    .progressbar li.active:before {
        background: #eb3f66;
        color: #fff;
    }

    .progressbar li.active + li:after {
        background-color: #eb3f66;
    }

    .d-flex {
        display: inline-box !important;
        display: -webkit-inline-box !important;
        margin-top: 5%;

    }

    .contactImg img {
        width: 10% !important;
        margin: auto;
    }

    .top-head {
        text-align: center;
    }

    .line {
        margin: auto;
        margin-top: 1%;
    }
    .btn {
        margin: auto;
        display: block;
    }
    @media (max-width: 400px) {
        .progressbar li {
            width: 50% !important;
        }
    }
</style>
