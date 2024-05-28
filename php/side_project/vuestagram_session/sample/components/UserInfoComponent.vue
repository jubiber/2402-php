<template>
    <div class="user-info-box">
      <img src="/profile/default.png">
      <div class="user-info-content">
        <h2>admin</h2>
        <h3>작성글 수 : 256</h3>
      </div>
      <router-link to="/board/create"><button class="btn btn-submit b">글작성</button></router-link>
    </div>
    <hr>
</template>

<script setup>
</script>

<style>
@import url('../css/userInfo.css');
</style>
