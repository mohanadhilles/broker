<template>
    <div>
        <!--Header-->
        <Section/>
        <main id="page-content">
            <section id="profile-section">
                <div class="container">
                    <div class="row header-wrap">
                        <breadcrumb></breadcrumb>
                    </div>
                    <h2 class="main-heading">
                        {{$t("profile.title")}}
                    </h2>
                    <div class="line"></div>

                    <div v-if="user" class="row">
                        <div class="hideShow col-lg-12 col-12">
                            <div v-if="auth" class="media">
<span class="pic-wrapper">
<img width="120" alt="want mery" ref="personalImg"
     class="align-self-start profile-picture img-responsive rounded-circle"
     :src="user.imgUrl">
</span>
                                <div class="media-body media-info">
                                    <h4 class="pt-2 profile-id" style="line-height:.9;">{{ user.code }}, {{auth.age}}</h4>
                                    <img alt="place icon" class="location-icon" src="../assets/img/place.png">
                                    <span v-if="auth.nationality" class="location">{{ auth.nationality.title }}</span>
                                    <div class="profile-stars d-flex">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <h3 class="profile-about"
                                        v-if=" auth.passport  == null || auth.nationality.title  == null || auth.country == null">
                                        {{$t("profile.notComplete")}}</h3>
                                    <h3 class="profile-about" v-else>{{$t("profile.complete")}}</h3>

                                </div>
                            </div>

                            <div class="ml-4 mt-3 profile-pic">
                                <label for="Upload" class="changePhoto">{{$t("profile.photo")}}</label>
                                <input id="Upload" @change="savePhoto" type="file"  name="photo" accept="image/*" class="custom-file-inpt" value="Change photo">
                            </div>

                            <div class="profile-list">
                                <ul class="list list-unstyled">
                                    <li class="paddingLeft1 list-item">
                                        <img class="img1" src="../assets/img/listArrow.png">
                                        <span class="list-item-text">{{$t("profile.info")}}</span>
                                    </li>

                                    <!--========= information section =========-->

                                    <template>
                                        <div>
                                            <section v-if="user && user.role == 2" class="resume">
                                                <div class="container">
                                                    <form action="" class="resume-form" method="post">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.name ? 'has-danger' : '']">
                                                                    <label
                                                                        class="col-form-label">{{$t("profile.name")}} </label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.name"
                                                                               :class="['form-control', allerros.name ? 'has-danger' : '']"
                                                                               name="name" required type="text">
                                                                        <span v-if="allerros.name"
                                                                              :class="['badge badge-danger']">@{{ allerros.name[0] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.date_of_birth ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.date_birth")}} </label>

                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               v-model="user.date_of_birth"
                                                                               :class="['form-control', allerros.date_of_birth ? 'has-danger' : '']"
                                                                               name="date_of_birth" required
                                                                               type="date">
                                                                        <span v-if="allerros.date_of_birth"
                                                                              :class="['badge badge-danger']">@{{ allerros.date_of_birth[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.passport ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.passport")}} </label>
                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               v-model="user.passport"
                                                                               :class="['form-control', allerros.passport ? 'has-danger' : '']"
                                                                               name="passport" required
                                                                               type="text">
                                                                        <span v-if="allerros.passport"
                                                                              :class="['badge badge-danger']">@{{ allerros.passport[0] }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.phone ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.mobile")}}</label>
                                                                    <div class="input-field">
                                                                        <div class="d-flex">
                                                                            <input class="form-control mobile-number"
                                                                                   id="phoneNumber"
                                                                                   :class="['form-control', allerros.phone ? 'has-danger' : '']"
                                                                                   placeholder="59xxxxxxx"
                                                                                   v-model="user.phone" type="text">

                                                                        </div>
                                                                        <span v-if="allerros.phone"
                                                                              :class="['badge badge-danger']">@{{ allerros.phone[0] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.email ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.emp_email")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.email"
                                                                               :class="['form-control', allerros.email ? 'has-danger' : '']"
                                                                               name="email" required type="email">
                                                                        <span v-if="allerros.email"
                                                                              :class="['badge badge-danger']">@{{ allerros.email[0] }}</span>

                                                                    </div>
                                                                </div>

                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.cv ? 'has-danger' : '']">
                                                                    <label for="fileUpload" class="changePassport attach">{{$t("profile.attach")}}</label>
                                                                    <input id="fileUpload" @change="savePassport" type="file"
                                                                           name="cv" accept="*/*" class="custom-file-input" value="Change Passport">
<!--                                                                    <label class="col-form-label attach">{{$t("profile.passport")}}</label>-->
                                                                    <div class="input-field">
                                                                        <div class="ml-4 mt-3 profile-pic">

                                                                        </div>
                                                                        <img  alt="want mery" ref="personalfile"
                                                                             class="align-self-start profile-picture img-responsive img-thumbnail"
                                                                             :src="pass">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6">

                                                                <div class="form-group form-select row"
                                                                     :class="['form-group', allerros.religion ? 'has-danger' : '']">
                                                                    <label class="col-form-label"
                                                                           for="education">{{$t("profile.rel")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="religion"
                                                                                :class="['form-control', allerros.religion ? 'has-danger' : '']"
                                                                                v-model="user.religion" name="religion">
                                                                            <option v-for="religion in religions"
                                                                                    :value="religion.id">
                                                                                {{religion.title}}
                                                                            </option>
                                                                        </select>
                                                                        <span v-if="allerros.religion"
                                                                              :class="['badge badge-danger']">@{{ allerros.religion[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group form-select row"
                                                                     :class="['form-group', allerros.job_type ? 'has-danger' : '']">
                                                                    <label class="col-form-label" for="job_type">{{$t("profile.type")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="job_type"
                                                                                :class="['form-control', allerros.job_type ? 'has-danger' : '']"
                                                                                v-model="user.job_type" name="job_type">
                                                                            <option v-for="job_type in job_types"
                                                                                    :value="job_type.id">
                                                                                {{job_type.title}}
                                                                            </option>
                                                                        </select>
                                                                        <span v-if="allerros.job_type"
                                                                              :class="['badge badge-danger']">@{{ allerros.job_type[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.experience ? 'has-danger' : '']">
                                                                    <label
                                                                        class=" col-form-label">{{$t("profile.exp")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               v-model="user.experience"
                                                                               name="experience"
                                                                               required
                                                                               :class="['form-control', allerros.experience ? 'has-danger' : '']"
                                                                               type="number">
                                                                        <span v-if="allerros.experience"
                                                                              :class="['badge badge-danger']">@{{ allerros.experience[0] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label" for="country">{{$t("profile.work_in")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control"
                                                                                v-model="user.worked_in"
                                                                                name="worked_in">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label" for="country">{{$t("profile.current")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="country"
                                                                                v-model="user.country"
                                                                                name="country">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label"
                                                                           for="country">{{$t("profile.nation")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="nationality"
                                                                                v-model="user.nationality"
                                                                                name="nationality">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="btn btn-save">
                                                                    <button class="btn btn-danger--custom"
                                                                            @click.prevent="updateInformation"
                                                                            type="submit">{{$t("upload")}}
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </section>

                                            <section v-if="user && user.role == 3" class="resume">
                                                <div class="container">
                                                    <form action="" class="resume-form" method="post">
                                                        <div class="row">


                                                            <div class="col-lg-6">
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.name ? 'has-danger' : '']">
                                                                    <label
                                                                        class="col-form-label">{{$t("profile.name")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.name"
                                                                               :class="['form-control', allerros.name ? 'has-danger' : '']"
                                                                               name="name" required type="text">
                                                                        <span v-if="allerros.name"
                                                                              :class="['badge badge-danger']">@{{ allerros.name[0] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-form-label">{{$t("profile.date_birth")}} </label>
                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               v-model="user.date_of_birth"
                                                                               name="date_of_birth" required
                                                                               type="date">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.phone ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.mobile")}}</label>
                                                                    <div class="input-field">
                                                                        <div class="d-flex">
                                                                            <!--<div class="select position-relative">-->
                                                                            <!--<select-->
                                                                            <!--class="custom-select w-auto position-relative code-mob">-->
                                                                            <!--<option selected>+970</option>-->
                                                                            <!--<option value="1">+971</option>-->
                                                                            <!--<option value="2">+972</option>-->
                                                                            <!--<option value="3">+973</option>-->
                                                                            <!--</select>-->
                                                                            <!--</div>-->
                                                                            <!--                                <div class="form-group  w-100">-->
                                                                            <input class="form-control mobile-number"
                                                                                   id="phoneNumber"
                                                                                   :class="['form-control', allerros.phone ? 'has-danger' : '']"
                                                                                   placeholder="59xxxxxxx"
                                                                                   v-model="user.phone" type="text">
                                                                            <span v-if="allerros.phone"
                                                                                  :class="['badge badge-danger']">@{{ allerros.phone[0] }}</span>
                                                                            <!--                                </div>-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.email ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.emp_email")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.email"
                                                                               :class="['form-control', allerros.email ? 'has-danger' : '']"
                                                                               name="email" required type="email">
                                                                        <span v-if="allerros.email"
                                                                              :class="['badge badge-danger']">@{{ allerros.email[0] }}</span>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="col-lg-6">

                                                                <div class="form-group form-select row">
                                                                    <label class="col-form-label"
                                                                           for="Educations">{{$t("profile.rel")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="religion"
                                                                                v-model="user.religion" name="religion">
                                                                            <option v-for="religion in religions"
                                                                                    :value="religion.id">
                                                                                {{religion.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.no_of_child ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("details.child")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               v-model="user.no_of_child"
                                                                               name="no_of_child"
                                                                               required
                                                                               min="0"
                                                                               :class="['form-control', allerros.no_of_child ? 'has-danger' : '']"
                                                                               type="number">
                                                                        <span v-if="allerros.no_of_child"
                                                                              :class="['badge badge-danger']">@{{ allerros.no_of_child[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label" for="country">{{$t("profile.current")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="country"
                                                                                v-model="user.country"
                                                                                name="country">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label"
                                                                           for="country">{{$t("profile.nation")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="nationality"
                                                                                v-model="user.nationality"
                                                                                name="nationality">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{
                                                                                country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="btn btn-save">
                                                                    <button class="btn btn-danger--custom"
                                                                            @click.prevent="updateInformation"
                                                                            type="submit">{{$t("update")}}
                                                                    </button>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </section>

                                            <section v-if="user && user.role == 4" class="resume">
                                                <div class="container">
                                                    <form action="" class="resume-form" method="post">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.name ? 'has-danger' : '']">
                                                                    <label
                                                                        class="col-form-label">{{$t("profile.name")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.name"
                                                                               :class="['form-control', allerros.name ? 'has-danger' : '']"
                                                                               name="name" required type="text">
                                                                        <span v-if="allerros.name"
                                                                              :class="['badge badge-danger']">@{{ allerros.name[0] }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.brand ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.brand")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.brand"
                                                                               name="brand" required
                                                                               :class="['form-control', allerros.brand ? 'has-danger' : '']"
                                                                               type="text">
                                                                        <span v-if="allerros.brand"
                                                                              :class="['badge badge-danger']">@{{ allerros.brand[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.phone ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.mobile")}}</label>
                                                                    <div class="input-field">
                                                                        <div class="d-flex">
                                                                            <input class="form-control mobile-number"
                                                                                   id="phoneNumber"
                                                                                   placeholder="59xxxxxxx"
                                                                                   :class="['form-control', allerros.phone ? 'has-danger' : '']"
                                                                                   v-model="user.phone" type="text">

                                                                            <!--                                </div>-->
                                                                        </div>
                                                                        <span v-if="allerros.phone"
                                                                              :class="['badge badge-danger']">@{{ allerros.phone[0] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.email ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.emp_email")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control" v-model="user.email"
                                                                               :class="['form-control', allerros.email ? 'has-danger' : '']"
                                                                               name="email" required type="email">
                                                                        <span v-if="allerros.email"
                                                                              :class="['badge badge-danger']">@{{ allerros.email[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.whats_app ? 'has-danger' : '']">
                                                                    <label class="col-form-label">{{$t("profile.whatsapp")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               :class="['form-control', allerros.whats_app ? 'has-danger' : '']"
                                                                               v-model="user.whats_app"
                                                                               name="whats_app" required type="text">
                                                                        <span v-if="allerros.whats_app"
                                                                              :class="['badge badge-danger']">@{{ allerros.whats_app[0] }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row"
                                                                     :class="['form-group', allerros.facebook ? 'has-danger' : '']">
                                                                    <label
                                                                        class="col-form-label">{{$t("profile.fb")}}</label>
                                                                    <div class="input-field">
                                                                        <input class="form-control"
                                                                               :class="['form-control', allerros.facebook ? 'has-danger' : '']"
                                                                               v-model="user.facebook"
                                                                               name="facebook" required type="text">
                                                                        <span v-if="allerros.facebook"
                                                                              :class="['badge badge-danger']">@{{ allerros.facebook[0] }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6">

                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label" for="country">{{$t("profile.current")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="country"
                                                                                v-model="user.country"
                                                                                name="country">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-select row">
                                                                    <label class=" col-form-label"
                                                                           for="country">{{$t("profile.nation")}}</label>
                                                                    <div class="input-field">
                                                                        <select class="form-control" id="nationality"
                                                                                v-model="user.nationality"
                                                                                name="nationality">
                                                                            <option v-for="country in countries"
                                                                                    :value="country.id">{{country.title}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group form-select row"
                                                                     :class="['form-group', allerros.bio ? 'has-danger' : '']">
                                                                    <label class=" col-form-label"
                                                                           for="country">{{$t("profile.bio")}}</label>
                                                                    <div class="input-field">
                                                                        <textarea name="bio" style="width: 100%"
                                                                                  v-model="user.bio" id="bio"
                                                                                  :class="['form-control', allerros.bio ? 'has-danger' : '']"
                                                                                  rows="5"></textarea>
                                                                        <span v-if="allerros.bio"
                                                                              :class="['badge badge-danger']">@{{ allerros.bio[0] }}</span>
                                                                    </div>
                                                                </div>


                                                                <div class="btn btn-save">
                                                                    <button class="btn btn-danger--custom"
                                                                            @click.prevent="updateInformation"
                                                                            type="submit">{{$t("update")}}
                                                                    </button>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </section>

                                        </div>
                                    </template>


                                    <li @click.prevent="toggleView('toFriend')" class="paddingLeft1 list-item">
                                        <img class="img2" src="../assets/img/listArrow.png">
                                        <span class="list-item-text">{{$t("profile.refer")}}</span>
                                    </li>

                                    <!--=======  Referral Section ==========-->
                                    <template v-if="mode.toFriend">
                                        <section v-if="user" class="referral">
                                            <div class="referral-wrapper">
                                                <h2 class="referral-header">{{$t("profile.sub_refer")}}</h2>
                                                <p class="referral-description">
                                                    {{$t("profile.refer_content")}}
                                                </p>
                                                <form action="" class="referral-form">
                                                    <div class="form-group">
                                                        <label class="form-label">{{$t("profile.send")}}</label>
                                                        <div class="input-field--link">
                                                            <input class="form-control" id="link" name="link"
                                                                   :placeholder="referal" :value="referal" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <button @click.prevent="copy" class="btn btn-danger--custom">
                                                            {{$t("profile.copy")}}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </template>

                                    <li @click.prevent="toggleView('jobs')" class="paddingLeft1 list-item">
                                        <img class="img3" src="../assets/img/listArrow.png">
                                        <span class="list-item-text">{{$t("profile.job")}}</span>
                                    </li>
                                    <template v-if="mode.jobs">
                                        <section class="job-applied" v-if="user && user.role == 2">
                                            <!--========= Table Header ==========-->
                                            <div class="content-wrapper">
                                                <div class="row row-header">
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile.emp_name")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile.emp_email")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile.emp_phone")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile.status")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">#</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <!--========= Table Content ==========-->
                                            <div class="content-wrapper" v-for="accept of  accepts">
                                                <div class="row content-wrapper--1">
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-title text-left">{{accept.user.name}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-content text-center">{{accept.user.email}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-content text-center">{{accept.user.phone}}</p>
                                                    </div>

                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-status text-center ">{{accept.active == 0 ?
                                                            'waiting list' : 'arrive' }}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <router-link
                                                            :to="{ name: 'JobDetails', params:{ id: accept.job_id }  }"
                                                            class="more">{{$t("profile.view")}}<img alt="arrow"
                                                                                                    src="../assets/img/rihgtArrow.png">
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="job-applied" v-else>

                                            <!--========= Table Header ==========-->
                                            <div class="content-wrapper">
                                                <div class="row row-header">
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile.title_job")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile_wanted")}}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-1">
                                                        <p class="job-head text-center">{{$t("profile.gender")}}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-1">
                                                        <p class="job-head text-center">{{$t("profile.expected")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-head text-center">{{$t("profile.contract")}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-3">
                                                        <p class="job-head text-center">{{$t("profile.order")}}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-1">
                                                        <p class="job-head text-center">#</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <!--========= Table Content ==========-->
                                            <div class="content-wrapper">
                                                <div class="row content-wrapper--1" v-for="job of  jobs">
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-title text-left">{{job.type.title}}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-content text-center">{{job.wanted_at}}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-1">
                                                        <p class="job-content text-center">{{job.gender == 1 ? 'male' : 'female' }}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-1">
                                                        <p class="job-content text-center">{{job.salary}} $</p>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-content text-center">{{job.contract.title}}</p>
                                                    </div>

                                                    <div class="col-lg-2 col-2">
                                                        <p class="job-status text-center ">{{job.status == 0 ? 'waiting list' : 'finish from worker' }}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-1">
                                                        <router-link
                                                            :to="{ name: 'JobDetails', params:{ id: job.id }  }"
                                                            class="more">
                                                            {{$t("more")}}<img alt="arrow" src="../assets/img/rihgtArrow.png">
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </template>


                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </main>

    </div>
</template>


<script>
    import Section from '../components/Section';
    import axios from 'axios';
    import Breadcrumb from "../components/Breadcrumb";


    export default {
        name: 'Profile',
        components: {Breadcrumb, Section},
        data: function () {
            return {
                auth: null,
                user: null,
                authed: false,
                educations: [],
                countries: [],
                skills: [],
                languages_levels: [],
                marital_status: [],
                religions: [],
                job_types: [],
                contracts: [],
                allerros: [],
                accepts: [],
                jobs: [],
                mode: {
                    information: true,
                    toFriend: false,
                    jobs: false,
                }
            };
        },
        mounted: function () {
            document.getElementById('top-nav').style.display = 'block';
        },
        created: function () {
            this.getCurrent();
            this.getUser();
            this.getEducations();
            this.getCountries();
            this.getLanguagesLevels();
            this.getSkills();
            this.getMaritalStatus();
            this.getReligions();
            this.getTypes();
            this.getContract();
            this.getJobPosted();
            this.acceptJob();

        },

        computed: {
         pass(){
            return window.location.origin +'/public/storage/storage/'+ this.user.cv;
         },
            referal() {
                return window.location.origin + '/en/profile/' + this.user.id
            },
            photo() {
                return this.user.imgUrl;
            },
        },
        methods: {
            updateInformation() {
                let url = `/api/worker/${this.user.id}/update`;

                axios.post(url, this.user, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(
                    res => {
                        localStorage.setItem('user', JSON.stringify(res.data.data));
                        this.allerros = [];
                        this.$notify({
                            group: 'foo',
                            title: 'Success',
                            text: 'updated successfully',
                            width: 500,
                            position: 'top left',
                            type: 'success'
                        });
                    }
                ).catch(
                    err => {
                        this.$notify({
                            group: 'foo',
                            title: 'Failed',
                            text: 'updated failed',
                            width: 500,
                            position: 'top left',
                            type: 'error'
                        });
                        this.allerros = err.response.data.date;
                    })
            },
            acceptJob() {
                axios.get('api/worker/accept', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.accepts = res.data.data;
                })
            },

            getEducations() {
                axios.get('api/worker/education', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.educations = res.data.data;
                })
            },
            getCountries() {
                axios.get('/api/worker/country', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.countries = res.data.data;
                })
            },
            getSkills() {
                axios.get('/api/worker/skills', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.skills = res.data.data;
                })
            },
            getLanguagesLevels() {
                axios.get('/api/worker/language', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.languages_levels = res.data.data;
                })
            },
            getMaritalStatus() {
                axios.get('/api/worker/marital', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.marital_status = res.data.data;
                })
            },
            getReligions() {
                axios.get('/api/worker/religion', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.religions = res.data.data;
                })
            },
            getTypes() {
                axios.get('/api/worker/job_type', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.job_types = res.data.data;
                })
            },

            getJobPosted() {
                axios.get('/api/employer/jobs', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.jobs = res.data.data.data;
                })
            },

            copy() {
                let testingCodeToCopy = document.querySelector('#link');
                testingCodeToCopy.setAttribute('type', 'text');
                testingCodeToCopy.select();

                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';
                    this.$notify({
                        group: 'foo',
                        title: 'copied',
                        text: 'Profile link was copied' + msg,
                        width: 500,
                        position: 'top right',
                        type: 'success'
                    });
                } catch (err) {
                    this.$notify({
                        group: 'foo',
                        title: 'failed',
                        text: 'Oops, unable to copy',
                        width: 500,
                        position: 'top right',
                        type: 'error'
                    });
                }
            },
            savePhoto(event) {
                let image = event.target.files[0];
                let fd = new FormData();
                const reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e => {
                    this.$refs.personalImg.src = e.target.result;
                };
                fd.append('photo', image);
                axios.post('/api/worker/avatar', fd, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    localStorage.setItem('user', JSON.stringify(res.data.data));
                })
            },

            savePassport(event) {
                let file = event.target.files[0];
                let fd = new FormData();
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = e => {
                    this.$refs.personalfile.src = e.target.result;
                };
                fd.append('cv', file);
                axios.post('/api/worker/file', fd, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    localStorage.setItem('user', JSON.stringify(res.data.data));
                })
            },

            toggleView(key) {
                if (key === 'information') {
                    this.mode.information = !this.mode.information;
                } else if (key === 'toFriend') {
                    this.mode.toFriend = !this.mode.toFriend;
                } else if (key === 'jobs') {
                    this.mode.jobs = !this.mode.jobs;
                }
            },
            getUser() {
                axios.get('/api/auth', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.auth = res.data.data[0];
                    this.authed = true;
                });
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
            getContract() {
                axios.get('/api/worker/contract', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.contracts = res.data.data;
                })
            },
        }
    }
</script>
<style scoped>
    #profile-section .profile-about {
        display: inline;
        border-bottom: dashed 2px #32bcca;
        padding-bottom: 5px;
    }
    .img-thumbnail{
        width:300px;
        height:500px;
    }
    .attach{
        border: solid 2px #eb3f66;
        color: white;
        background: #eb3f66;
        padding: 10px;
        border-radius: 5px;
    }
</style>

