<template>
    <div>
        <div v-for="item in props.products" :key="item.productName">
          <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
          <p>{{ item.price}} won</p>        
        </div>
        <!-- slot 쓰면 부모쪽에서 정의한게 나옴, -->
        <slot></slot>
    </div>
    <ProvideTest />
</template>
<script setup>
import {defineProps} from 'vue';
import ProvideTest from './ProvideTest.vue';

const props = defineProps({
    'products': Array
});

// for(const item of props.products) {
//     console.log(item);
// }

</script>

<style>
    
</style>