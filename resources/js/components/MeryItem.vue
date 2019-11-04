<template>
    <div class="slide">
        <a href="#"><img style="border-radius: 20%" width="180" alt="slide img img-responsive" :src="item.imgUrl"></a>
        <h2 class="name">{{ item.name }}</h2>
        <div class="stars d-flex justify-content-center">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <h2 class="age pt-2">{{ item.age }} {{$t("years")}}</h2>

    </div>
</template>

<script>
    export default  {
        props : ['mery'],
        name: 'MeryItem',
        data: function () {
            return {};
        },
        computed :  {
            item: function () {
                return this.mery;
            }
        }

    }
</script>
