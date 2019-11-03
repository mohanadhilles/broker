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
                                <h1> mery </h1>
                                <h2>Care for all you love.</h2>
                                <p>Search for after-school sitters, nannies, senior care and more.</p>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item carousel-item--custom">
                        <div class="carousel-caption carousel-caption--custom img-slide">
                            <!-- Header caption -->
                            <section class="header-text">
                                <h1> mery </h1>
                                <h2>Care for all you love.</h2>
                                <p>Search for after-school sitters, nannies, senior care and more.</p>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item carousel-item--custom">
                        <div class="carousel-caption carousel-caption--custom img-slide">
                            <!-- Header caption -->
                            <section class="header-text">
                                <h1> mery </h1>
                                <h2>Care for all you love.</h2>
                                <p>Search for after-school sitters, nannies, senior care and more.</p>
                            </section>
                        </div>
                    </div>
                </div>

            </div>

            <section id="forgetPassword">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="left-icon-section pb-3">
                            </div>
                        </div>

                        <div class="col-lg-10">
                            <form class="login-form  text-center pr-3">
                                <div class="left-section">
                                    <p class="enterEmail py-2">Your Phone No. and code No. In Mery.com </p>
                                    <div class="form-group form-group--custom">
                                        <label aria-describedby="emailHelp" class="form-control">{{phone}} -
                                            {{code}}</label>
                                        <div class="line"></div>
                                        {{question_id}} / {{answer_id}}
                                        <h4 :value="question_id">{{question}}</h4>
                                        <select v-model="answer_id">
                                            <option :value="1">No i did't</option>
                                            <option :value="2">Yes i did</option>
                                            <option :value="3">Other</option>
                                            <option :value="4">I Have a Date</option>
                                        </select>
                                        <input v-if="answer_id == 3" type="text"  v-model="other" name="other"/>
                                        <input v-if="answer_id == 4" type="date"  v-model="date" name="date"/>
                                    </div>

                                    <p class="newPassword">we will send Question to Answer from you</p>
                                    <div class="form-group form-group--custom pt-3">
                                        <input aria-describedby="emailHelp"
                                               class="form-control btn btn-danger--custom"
                                            name="submit" type="submit" value="Send" @click.prevent="findUser">

                                            <router-link v-if="answer_id == 1" aria-describedby="emailHelp" class="form-control link-home btn btn-danger--custom" :to="{name: 'profile'}">are you want exit</router-link>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 right-section">
                            <img :src="img" width="100px">
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </header>
</template>

<script>

    import axios from 'axios';

    export default {
        name: 'FollowUp',
        data() {
            return {
                id: 1,
                phone: '',
                question: '',
                answer: null,
                input: true,
                form: true,
                user_id: '',
                code: '',
                question_id: null,
                answer_id: null,
                img: null,
                date: null,
                other: '',
            };
        },
        created: function () {
            this.getDetails()
        },

        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },

        methods: {
            findUser() {
                axios.post('/api/update/follow', {
                    user_id: this.user_id,
                    answer_id: this.answer_id,
                    question_id: this.question_id,
                    date: this.data,
                    other: this.other,
                }, {
                    headers: {Authorization: 'Bearer ' + localStorage.getItem('token')}
                }).then(res => {
                        this.form = false
                        this.question_id = res.data.message.id;
                        this.question = res.data.message.title;
                        console.log(res)
                    }
                )
            },

            getDetails() {
                axios.get('/api/follow/', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.loaded = true;
                    this.code = res.data.data.user.code;
                    this.user_id = res.data.data.user.id;
                    this.answer_id = res.data.data.answer.id;
                    this.question_id = res.data.message.id;
                    this.phone = res.data.data.user.phone;
                    this.question = res.data.message.title;
                    this.img = res.data.data.user.imgUrl;
                    this.answer = res.data.data.answer.title;
                    console.log(this.user_id, this.answer);
                    console.log(res.data);
                }).catch(error => {
                    this.allerros = error.response.data.date;

                });
            },

        }
    }


</script>
<style scoped>
    select {
        border: 1px solid #ea3f66;
    }

    .line {
        margin: 0.75rem 0 0.75rem 11rem;
        width: 50%;
    }
    .link-home {
        margin-top: 10px;
        background-color: #1bb6c5 !important;
        border: 2px solid #1bb6c5 !important;
        width: 50%;
    }

    #forgetPassword .form-group--custom input {
        width: 50%;
    }

    select {
        width: 50%;
    }

    @media (max-width: 768px) {
        #forgetPassword .enterEmail {
            width: 100%;
        }

        .line {
            margin: 0.75rem 0 0.75rem 5rem !important;
            width: 50%;
        }
    }

</style>

<style>
</style>


