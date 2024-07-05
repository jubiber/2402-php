<template>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
        <div class="main_title">
            <img src="/img/img.ppg.jpg" class="recommend_main_img">
        </div>
        <main>
            <h2 class="title">추천 게시판</h2>
             <p class="title-line"><span class="side-title"><img class="fire-icon" src="../../../public/img/free-icon-fire.png" alt="">HOT 여름 추천 레시피</span></p>
            <div class="recommend_grid">
                <div @click="$store.dispatch('getRecipeDetail', item.id)" class="center season_img_box" v-for="(item, index) in $store.state.seasonRecommendInfo" :key="index">
                     <img class="item-image" :src="item.thumbnail">
                    <div class="data-box">
                        <div class="card-title">{{ item.title }}</div>
                        <div class="card-name">{{ item.u_nickname }}</div>
                        <div class="star-view">
                            <div class="card-star">{{ formatDate(item.created_at) }}</div>
                            <div class="card-view">조회수 : {{ item.views }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ad-box swiper-container">
                <p><span class="side-title">광고</span></p>
                <div class="grid-container">
                  <div class="swiper-slide">
                    <div class="swiper-slide">
                        <img src="../../../public/img/ad.jpg" alt="이미지1">
                        <p>조리도구 광고 설명 1</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="../../../public/img/ad.jpg" alt="이미지2">
                        <p>조리도구 광고 설명 2</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="../../../public/img/ad.jpg" alt="이미지3">
                        <p>조리도구 광고 설명 3</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="../../../public/img/ad.jpg" alt="이미지4">
                        <p>조리도구 광고 설명 4</p>
                    </div>
                  </div>
                  <div class="swiper-button-next"><img src="" alt=""></div>
                  <div class="swiper-button-prev"><img src="" alt=""></div>
                </div> 
            </div>
            <p><span class="side-title">냉장고 털기 추천 레시피</span></p>
            <div class="center frige">
                <img src="/img/삼계탕.png" alt="">
                <img src="/img/삼계탕.png" alt="">
                <img src="/img/삼계탕.png" alt="">
                <img src="/img/삼계탕.png" alt="">            
            </div>
            <p><span class="side-title">주간 베스트 레시피</span></p>
            <div class="center frige">
                <img src="/img/삼계탕.png" alt="">
                <img src="/img/삼계탕.png" alt="">
                <img src="/img/삼계탕.png" alt="">
                <img src="/img/삼계탕.png" alt="">            
            </div>
        </main>
    </template>
    <script setup>
    import { onBeforeMount } from 'vue';
    import { useStore } from 'vuex';
    import Swiper from 'swiper/bundle';
    
    const store = useStore(); // Vuex 스토어 사용
    
    onBeforeMount(() => {
        store.dispatch('getSeasonRecommendInfo');
    })
    
    // 날짜 표시 제어
    const formatDate = (dateString) => {
        return new Date(dateString).toLocaleDateString('ko-KR', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        }).replace(/\.$/, ''); 
    };
    
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
    
    </script>
    <style scoped src="../../css/recommend.css">
        
    </style>