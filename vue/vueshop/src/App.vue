<template>
    <img alt="Vue logo" src="@/assets/img/flower.jpg" style="width: 130px; height: auto; margin-right: 950px; ">
    <!-- 헤더 -->
    <!-- props : 자식 컴포넌트에게 props 속성을 이용해서 데이터를 전달 -->

    <HeaderComponent 
      :navList="navList"
    />  
  <!-- <div class="nav">
    <a v-for="item in navList" :key="item.navItem" herf="#">{{ item.navItem }}</a>
    <a href="#">HOME</a>
    <a href="#">PRODUCT</a>
    <a href="#">쥬얼리</a>
    <a href="#">가방</a>
    <a href="#">기타</a>
  </div> -->

    <!-- 상품 리스트 -->
  <div>
    <!-- 앞에 배열 키랑 뒤에 맨뒤에 키랑 다르다 -->
      <div v-for="(item, key) in products" :key="key">
        <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
        <p>{{ item.price }} won</p>
      </div>
    <!-- 스크립트에서 선언한거 씀
      <h4 @click="myOpenModal(product[0])">{{ products[0].productName }}</h4>
      <p>{{ products[0].price }} won</p>
    </div>
    <div>
      <h4 @click="flgModal = !flgModal">{{ products[1].productName }}</h4>
      <p>{{ products[1].price }} won</p>
    </div>
    <div>
      <h4 @click="flgModal = !flgModal">{{ products[2].productName }}</h4>
      <p>{{ products[2].price }} won</p>
    </div> -->

      <!-- false면 모달 자체가 생성 안됨 -->
  <!-- <div class="bg_black modal-wrapper" v-if="flgModal">
    <div class="bg_white "> -->


      <!-- ':' :값을 뷰문법으로 작성하고싶으면 속성명 앞에 콜론 붙여줘야함  원래 v-on:인데 생략함-->
      <!-- <img :src="product.img">
      <h4>{{ product.productName }}</h4>
      <p>{{ product.productName }}</p>
      <p>{{ product.price }}</p>
      <button class="btn-green" @click="flgModal = !flgModal">닫기</button>
    </div>
  </div>
  </div> -->

<!-- 모달있던 부분 ModalDetail로 옮김 -->
</template>

<script setup>
import { ref, reactive } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue';

// --------------------
// 데이터 바인딩
// --------------------

// 레프 react를 나눠서 저장한다? 둘 중 하나만 쓰쎔
// 객체 -> reactive 써야댐 (성능 좋)
// 일반타입 -> 레프 (성능 좋)

const pants = ref('롱스커트');
// const price = ref(10000);
console.log(pants);

// reactive: 객체 타입만 사용 가능하며, 해당 객체에 대한 반응어쩌고
const products = reactive([
  //배열부분 +
  // 하나의 객체씩
  {productName: 'Pants', price: 63000, productContent: '매우 아름다운 바지입니다.', img: require('@/assets/img/pants2.jpg')},
  {productName: 'T-shirts', price: 27000, productContent: '매우 아름다운 티셔츠입니다.', img: require('@/assets/img/shirts.jpg')},
  {productName: 'socks', price: 2000, productContent: '매우 아름다운 양말입니다.', img: require('@/assets/img/socks.jpg')},
]);


// 모달용 있던부분 ModalDetail로 옮김


// ----------
// 헤더 처리
// ----------
const navList = reactive([
  {navItem: 'HOME', },
  {navItem: 'PRODUCT', },
  {navItem: '쥬얼리', },
  {navItem: '가방', },
  {navItem: '기타', }
]);
  
console.log(products[0].price);

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
