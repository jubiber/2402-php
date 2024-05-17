<template>
        <h1>프로바이더 테스트</h1>
        <h3>{{ test.count }}</h3>
        <button @click="inject.addCount">프로바이더 증가</button>
</template>
<script setup>

import { inject } from 'vue';


// 예약어라서 const 옆에 inject 쓰면 안됨
const test = inject('test');
</script>

<style>    
</style>