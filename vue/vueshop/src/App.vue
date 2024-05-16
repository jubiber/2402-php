<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <div class="nav">
    <a href="#">HOME</a>
    <a href="#">PRODUCT</a>
    <a href="#">기타</a>
  </div>
  <div>
    <div>
      <!-- 스크립트에서 선언한거 씀 -->
      <h4>{{ products[0].productName }}</h4>
      <p>{{ products[0].price }} won</p>
      <button @click="products[0].price += 1000">가격증가</button>
    </div>
    <div>
      <h4>{{ products[1].productName }}</h4>
      <p>{{ products[1].price }} won</p>
      <button @click="products[1].price += 1000">가격증가</button>
    </div>
    <div>
      <h4>{{ products[2].productName }}</h4>
      <p>{{ products[2].price }} won</p>
      <button @click="products[2].price += 500">가격증가</button>
    </div>
  </div>
</template>

<script setup>

// --------------------
// 데이터 바인딩
// --------------------
// import { ref } from 'vue';

// 레프 react를 나눠서 저장한다? 둘 중 하나만 쓰쎔
// 객체 -> reactive 써야댐 (성능 좋)
// 일반타입 -> 레프 (성능 좋)

// const pants = ref('롱스커트');
// const price = ref(10000);

import { reactive } from 'vue';
const products = reactive([
  {productName: 'Pants', price: 63000},
  {productName: 'T-shirts', price: 27000},
  {productName: 'socks', price: 2000},
]);

</script>

<style>
/* 파일 따로 분리했을 경우 CSS 이케 불러온다  */
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* CSS 파일 따로 분리
 .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav  a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
