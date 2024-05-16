<template>

  <!-- 모달 -->
  <!-- false면 모달 자체가 생성 안됨 -->
  <div class="bg_black modal-wrapper" v-if="flgModal">
    <div class="bg_white ">
      <!-- ':' :값을 뷰문법으로 작성하고싶으면 속성명 앞에 콜론 붙여줘야함  원래 v-on:인데 생략함-->
      <img :src="product.img">
      <h4>{{ product.productName }}</h4>
      <p>{{ product.productName }}</p>
      <p>{{ product.price }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// -------
// 모달용
// -------
const flgModal = ref(false); // 모달어쩌고
const product = ref({});
// const product = reactive({});
function myOpenModal(item) {
  // .value로 접근 해야된다는 사실(?)
  flgModal.value = !flgModal.value;
  product.value = item;
}


</script>

<style>
</style>
