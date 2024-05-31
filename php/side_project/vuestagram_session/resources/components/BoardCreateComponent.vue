<template>
  <form class="form-box" id="boardCreateForm">
    <!-- 글 작성 폼 제목 -->
    <h3 class="form-title">글 작성</h3>
    <img src="">
    <textarea name="content" placeholder="내용을 적어주세요." max="200"></textarea>
    <!-- 이미지 파일을 선택하는 입력 요소, 파일 선택 시 setFile 함수 호출 -->
    <input type="file" name="img" accept="image/*">
    <!-- 작성 버튼, 클릭 시 Vuex 스토어의 boardStore 액션을 디스패치 -->
    <button @click="$store.dispatch('boardStore')" type="button" class="btn btn-submit btn-bg-black">작성</button>
    <!-- 취소 버튼, 클릭 시 이전 페이지로 이동 -->
    <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
  </form>
  </template>
  <script setup>
  </script>
  <style>
  
  </style>
