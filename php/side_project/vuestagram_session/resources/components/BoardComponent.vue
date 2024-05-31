<template>
  <!-- 상세 -->
  <div v-if="detailFlg" class="board-detail-box">
    <div class="item">
      <img :src="detailItem.img">
      <hr>
      <p>{{ detailItem.content }}</p>
      <hr>
      <div class="etc-box">
        <span>작성자 : 홍길동</span>
        <button @click="$store.dispatch('deleteBoard', detailItem.id ); detailFlg = false;" class="btn btn-close btn-bg-black move-right">삭제</button>
        <button @click="closeDetail"class="btn btn-bg-black btn-close">닫기</button>
      </div>
    </div>
  </div>

  <!-- 리스트 -->
  <div class="board-list-box">
    <div @click="openDetail(item)" v-for="(item, key) in $store.state.boardData" :key="key" class="item">
        <img :src="item.img">
    </div>
  </div>
    <button v-if="$store.state.moreBoardFlg" @click="$store.dispatch('getMoreBoardData')" class="btn btn-bg-black btn-more"type="button">더보기</button>
  
</template>
<script setup>
import { onBeforeMount, reactive, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

let detailItem = reactive({});
let detailFlg = ref(false);

function openDetail(data) {
  detailItem = data;
  detailFlg.value = true;
}

function closeDetail() {
  detailItem = {};
  detailFlg.value = false;
}

onBeforeMount(() => {
  if(store.state.boardData.length < 1) {
    store.dispatch('getBoardData');
  } 
})

function deleteBoard(id) {
  store.dispatch('deleteBoard', id)
  .then(() => {
    // 삭제가 성공한 경우 상세 화면을 닫습니다.
    closeDetail();
  })
  .catch(error => {
    // 삭제가 실패한 경우
    console.error('게시물 삭제 실패:', error);
    alert('게시물 삭제에 실패했습니다.');
  });
}


</script>
<style>
@import url('../css/boardList.css');
.move-right {
  margin-left: 350px; /* 원하는 만큼의 픽셀 값으로 조정하세요 */
}
</style>
