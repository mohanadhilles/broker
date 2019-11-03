<template>
    <div v-if="!modal" aria-hidden="true" aria-labelledby="homeModal" class="modal fade" id="homeModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <a class="custom-link" href="#"><img alt="logo" class="modal-logo" src="../assets/img/logo.png"></a>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    </button>
                </div>
                <section>
                    <div class="modal-body text-center pt-0">
                        <section>
                            <h3 class="modal-heading">
                               {{$t("profile.modal_title")}}
                            </h3>
                            <form  class="modal-form">
                                <div class="form-group form-select">
                                    <label class="col-form-label sr-only"> Phone </label>
                                    <div class="input-field custom-filed">
                                        <div class="d-flex">
                                            <input class="form-control mobile-number"
                                                   id="phoneNumber"
                                                   :class="['form-control', allerros.phone ? 'has-danger' : '']"
                                                   placeholder="59xxxxxxx"
                                                   v-model="user.phone" type="text">
                                        </div>
                                        <span v-if="allerros.phone" :class="['badge badge-danger']">@{{ allerros.phone[0] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-filed mx-auto mt-2">
                                        <a class="form-control btn btn-danger--custom" name="submit" @click.prevent="update">{{$t("continue")}} </a>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <div class="modal-img">
                            <img alt="" src="../assets/img/mery-newpng.png">
                        </div>
                    </div>


                </section>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "ProfileModal",
        data:function () {
            return{
                phone:null,
                modal: !!phone,
            }
        },
        methods:{
            update(){

            }
        }
    }
</script>

<style scoped>

</style>
