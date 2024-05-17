<template>
  <Transition name="container">
  <div class="bg_black " v-if="props.flgModal">
        <div class="bg_white ">
          <!-- ':' :값을 뷰문법으로 작성하고싶으면 속성명 앞에 콜론 붙여줘야함  원래 v-on:인데 생략함-->
          <img :src="product.img">
          <h4>{{ props.product.productName }}</h4>
          <p>{{ props.product.productName }}</p>
          <p>{{ props.product.price }} won</p>
          <p>총액 : {{ props.product.price * cnt }}won</p>
          <input type="number" min="1" v-model="cnt">
          <br>
          <br>
          <button @click="close">닫기</button>
        </div>
      </div>
    </Transition>
  <!-- 모달 -->

</template>

<script setup>
import {  defineEmits, defineProps, ref } from 'vue';

const props = defineProps({
  'flgModal' : Boolean
  ,'product' : Object
});
const emit = defineEmits(['myCloseModal']);  

// 총액 처리 부분
const cnt = ref(1);

function close() {
  cnt.value = 1;
  emit('myCloseModal', props.product.productName);
}
</script>

<style>
/* 등장 */
.container-enter-from {
  opacity: 0;
}
.container-enter-active{
  transition: 1s ease;
}
/* 종료 */
.container-enter-to{
  opacity: 1;
}

.container-leave-from{
  transform: translateX(0px);
}
.container-leave-active {
  transition: all 4s;
}
.container-leave-to {
  transform: translateX(4000px);
}
</style>
