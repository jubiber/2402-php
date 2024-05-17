
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
    <BoardList
    :products="products"
    @myOpenModal="myOpenModal"
    >
    <!-- slot: 자식쪽에서 <slot></slot> 부분에 전달하여 자식컴포넌트에서 렌더링 -->
      <h3>부모쪽에서 정의한 슬롯</h3>
    </BoardList>
    <!-- 상품 리스트, 별도의 컴포넌트로 분리해 주세요 -->
    <div>
        <div v-for="(item, key) in products" :key="key">
          <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
          <p>{{ item.price}}</p>
        </div>
    </div>

    <div>

    </div>
 
    <!-- 모달 -->
    <ModalDetail
    :flgModal="flgModal"
    :product="product"
    @myCloseModal="myCloseModal"
    />


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
import { provide, ref, reactive } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue';
import ModalDetail from './components/ModalDetail.vue';
import BoardList from './components/BoardList.vue';

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
  {productName: 'Pants', price: 10000, productContent: '매우 아름다운 바지입니다.', img: require('@/assets/img/pants2.jpg')},
  {productName: 'T-shirts', price: 10000, productContent: '매우 아름다운 티셔츠입니다.', img: require('@/assets/img/shirts.jpg')},
  {productName: 'socks', price: 1000, productContent: '매우 아름다운 양말입니다.', img: require('@/assets/img/socks.jpg')},

])



// 모달용 있던부분 ModalDetail로 옮김


// ----------
// 헤더 처리
// ----------

const navList = reactive([
  {navItem: 'HOME', },
  {navItem: 'PRODUCT', },
  {navItem: '쥬얼리', },
  {navItem: '가방', },
  {navItem: '기타', },
])

console.log(products[0].price);

const flgModal = ref(false); // 모달어쩌고
let product = reactive({});
// const product = reactive({});
//부모쪽
function myOpenModal(item) {
  // .value로 접근 해야된다는 사실(?)
  flgModal.value = true; // !true에 !flgModal.value라고 적어도 됨.
  product = item;
}
//부모쪽
function myCloseModal(str) {
  flgModal.value = false; // false부분에 !flgModal.value라고 적오도 됨
  product = {};
  console.log(str); // 파라미터 연습용
}


// -----------------------
// Provide / Inject 연습
// -----------------------
const count = ref(0);


function addCount() {
  count.value++;
}


provide('test', {
  count
  ,addCount
});
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
