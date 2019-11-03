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

                <!--============== Services section ========= -->
                <section id="want-mery">
                    <div class="container">
                        <div class="row custom-row hide-row">
                            <div class="col-lg-2 col-12">
                                <nav aria-label="breadcrumb" class="start-over">
                                    <ol class="breadcrumb">
                                        <li aria-current="page" class="breadcrumb-item">
                                            <router-link :to="{name: 'home'}" class="custom-link" >
                                                <i class="fas fa-chevron-left back-icon"></i>
                                                <span class="paginate-header"> Start over </span>
                                            </router-link>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-lg-10 col-12">
                                <h3 class="main-heading">What kind of service do you offer?</h3>
                                <div class="line "></div>
                            </div>

                        </div>

                        <!---------------------all services Form------------>

                        <div class="services-row mx-5 mb-5">
                            <div class="row row-wrapper">

                                <div class="col-lg-4 col-6">
                                    <router-link :to="{name: 'need_mery'}" class="web-link service" data-serv="" >
                                        <div class="media line-right top line-sm-right line-sm-bottom">
                                   <span class="img-wrap mr-3">
                                       <img alt="want mery" class="align-self-start image" src="../assets/img/1.png">
                                   </span>
                                            <div class="media-body">
                                                <p class="img-paragraph p">I want Mary Rental system Contracts Monthly</p>

                                            </div>
                                        </div>
                                    </router-link>

                                    <a class="mobile-link" data-target="#find-mery-modal" data-toggle="modal"
                                       href="#find-mery-modal">
                                        <div class="media line-right top line-sm-right line-sm-bottom">
                                   <span class="img-wrap mr-3">
                                       <img alt="want mery" class="align-self-start image" src="../assets/img/1.png">
                                   </span>
                                            <div class="media-body">
                                                <p class="img-paragraph p">I want Mary Rental system Contracts Monthly</p>

                                            </div>
                                        </div>
                                    </a>
                                </div>


                                <!-- Modal -->
                                <div class="modal fade in" id="find-mery-modal" role="dialog" data-backdrop="false">
                                    <div class="modal-dialog bd-example-modal-sm" role="document">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <div class="text-center model-wrapper">
                                                    <img alt="mery img" src="../assets/img/photo1.png"
                                                         style="width: 4.06rem;height: 4.06rem;">

                                                </div>
                                                <p class="text-center modal-p">I wold like to:</p>

                                                <div class="btn-options d-flex justify-content-center">
                                                    <router-link :to="{name: 'need_mery'}" class="btn btn-danger--custom service" style="margin-right: .75rem;"> Find a mery </router-link>
                                                    <a class="btn btn-danger--custom" data-serv="need-mery" href="#"> Apply to
                                                        jobs </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <a class="service" data-serv="" href="#">
                                        <div class="media line-right top line-sm-bottom">
                               <span class="img-wrap mr-3">
                                             <img alt="want mery" class="align-self-start image"
                                                  src="../assets/img/2.png">
                                        </span>
                                            <div class="media-body">
                                                <p class="img-paragraph p">Delegate
                                                    To receive and
                                                    Connecting mery
                                                    From the airport</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <a class="service" data-serv href="#">
                                        <div class="media top line-sm-right line-sm-bottom">
                               <span class="img-wrap mr-3">
                                             <img alt="want mery" class="align-self-start image"
                                                  src="../assets/img/1.png">
                                        </span>
                                            <div class="media-body">
                                                <p class="img-paragraph">
                                                    I want mery well
                                                    known</p>

                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="middle-line"></div>

                                <div class="col-lg-4 col-6">
                                    <a class="service" data-serv href="#">
                                        <div class="media line-right bottom line-sm-bottom">
                               <span class="img-wrap mr-3">
                                             <img alt="want mery" class="align-self-start image pt-1"
                                                  src="../assets/img/4.png">
                                        </span>
                                            <div class="media-body">
                                                <p class="img-paragraph">I want to deliver
                                                    mery to the office</p>

                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <a class="service" data-serv href="#">
                                        <div class="media line-right bottom line-sm-right">
                               <span class="img-wrap mr-3">
                                             <img alt="want mery" class="align-self-start image pl-1 pt-1"
                                                  src="../assets/img/5.png">
                                        </span>
                                            <div class="media-body">
                                                <p class="img-paragraph">I want to give up
                                                    mery
                                                </p>

                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <a class="service" data-serv href="#">
                                        <div class="media bottom">
                               <span class="img-wrap mr-3">
                                             <img alt="want mery" class="align-self-start image pt-2"
                                                  src="../assets/img/6.png">
                                        </span>
                                            <div class="media-body">
                                                <p class="img-paragraph">I want mery for one
                                                    day</p>

                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                        </div>




                    </div>

                </section>
            </div>
        </header>

        <Best />


    </div>
</template>



<script>
    import Best from "../components/Best";
    export default {

        name: 'WantMery',
        components: {Best},
        mounted: function() {
            document.getElementById('top-nav').style.display = 'block';
        },
    }
</script>


