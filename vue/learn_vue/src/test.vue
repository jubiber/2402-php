<template>
    <!-- 감시자 -->
    <input type="text" v-model="text">
    <span :style="color">{{ msg }}</span>


</template>
<script>
import { ref, watch } from 'vue';

const text = ref('');
const msg = ref('');
const color = ref('');

watch(text, (val) => {
    const regex = /^[0-9]+$/;
    if(val === '') {
        msg.value = '';
    } else if(!regex.test(val)) {
        msg.value = 'X';
        color.value = 'color: red;';
    } else {
        msg.value = 'V';
        color.value = 'color: green;';
    }
})

</script>
<style>
    
</style>