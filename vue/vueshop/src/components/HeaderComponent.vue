<template>
    <div class="nav">
        <!-- <a href="#">홈</a> -->
        <a v-for="item in data.navList" :key="item.navItem" herf="#">{{ item.navItem }}</a>
    </div>
</template>

<script setup>

import { defineProps } from 'vue';
const data = defineProps({
    // 부모가 자식한테 전달해준거 앞에 작성하고 배열부분 적으면 됨
    'navList' : Array
});


</script>

<style>
</style>