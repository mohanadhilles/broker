<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li aria-current="page" class="breadcrumb-item">
                <router-link class="custom-link" :to="{name:'profile'}">
                    <i class="fas fa-chevron-left back-icon"></i>
                    <span class="paginate-header">{{$t("profile.title")}}</span>
                </router-link>
            </li>
            <li aria-current="page" class="breadcrumb-item active">
                <a class="custom-link" href="#">
                    <span class="paginate-header"></span>
                </a>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        name: "Breadcrumb",
    }
</script>

<style scoped>

</style>
