<template>
 <div class="user-info-box">
  <img :src="$store.state.userInfo.profile">
  <div class="user-info-content">
   <h2>{{ $store.state.userInfo.account }}</h2>
   <h3>작성글 수 : {{ $store.state.userInfo.boards_count }}</h3>
  </div>
  <router-link to="/create"><button class="btn btn-submit">글작성</button></router-link>
 </div> 
 <hr>
</template>

<script setup>

</script>

<style>
@import url('../css/userInfo.css');
</style>