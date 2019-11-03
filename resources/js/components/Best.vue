<template>
    <main>
        <!--  Best mery section -->
        <section class="best-mery" id="best-mery">
            <div class="container">
                <h2 class="mery-header">{{$t("title")}}</h2>
                <div class="line mx-auto"></div>
                <div class="sliderSlider">
                    <section class="customer-logos slider mt-4" id="slick-slid">

                        <MeryItem v-for="item of merys" :key="item.id" :mery="item" />

                    </section>
                    <ul class="controls">
                        <a class="prev" href="#slick-slid"><img alt="" src="../assets/img/prev.png"></a>
                        <a class="next" href="#slick-slid"><img alt="" src="../assets/img/next.png"></a>
                    </ul>
                </div>

            </div>

            <div class="radial-line mx-auto"></div>

            <div class="form-group form-group--custom mx-auto mt-5">
                <button @click.prevent="goToMery"  aria-describedby="emailHelp" class="form-control btn btn-danger--custom"><i class="fas fa-chevron-left"></i>{{$t("see_all")}}
                </button>
            </div>
        </section>

    </main>
</template>

<script>
    import MeryItem from './MeryItem';
    import axios from 'axios';

    export default {
        name: 'Best',
        components: { MeryItem },
        data() {
            return {
                merys: [],
            };
        },
        mounted() {
            this.getMerys();

        },
        updated () {
            $(this.$el).find('.customer-logos').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                centerMode: true,
                centerPadding: '10px',
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        arrows: true,
                        prevArrow: $('.prev'),
                        nextArrow: $('.next'),
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3,
                        arrows: true,
                        prevArrow: $('.prev'),
                        nextArrow: $('.next'),
                    }
                }]
            });
        },
        methods: {
            getMerys() {
                axios.get('api/worker', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.merys = res.data.data.data;
                })
            },
            goToMery() {
                this.$router.push({ name:'mery_filter' })
            }

        }
    }
</script>

