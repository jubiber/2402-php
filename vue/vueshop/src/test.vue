<template>

<h1 v-if="flg === '0'">0 입니다.</h1>
<h1 v-else-if="flg === '1'">1 입니다.</h1>
<h1 v-else>기타 입니다.</h1>

<div v-for="val in 5" :key="val">
    <p>{{ val }}</p>
</div>


<!-- 리스트 렌더링 -->
<!-- 데이터 값만 사용할 경우 -->
<div v-for="item in data" :key="item.name">
<p>{{ item.name}} - {{ item.age }} - {{ item.gender }}</p>
</div>

<!-- 데이터 키와 값 모두 사용할 경우 -->
<div v-for="(val, key) in data":key="key">
    <p>{{ key }} - {{ val }}</p>
</div>

<!-- 이벤트 핸들링 -->
<h1>{{ cnt }}</h1>
<button @click="cnt++">증가</button>

<!-- 메소드 핸들러: 컴포넌트에 정의된 메소드 이름이나 경로를 통한 이벤트 -->
<h1>{{ cnt }}</h1>
<button @mouseenter="addCnt">증가</button>


<h1>Parnets component</h1>
<input type="text" v-model="name">
<h3>{{ name }}</h3>
<hr>
<!-- 자식 컴포넌트 호출 -->
<TestChild :name="name"/>



<h1 v-show="flg">v-show 입니다.</h1>
<button @click="flg = !flg">토글</button>
</template>

<script setup>
import {ref} from 'vue';

const flg = ref('0');
const cnt = ref(0);
function addCnt() {
    cnt.value++;
}

import {reactive} from 'vue';

const data = reactive(
    [
        {name: '그로밋', age: 20, gender: 'men'}
        ,{name: '몸무', age: 30, gender: 'woman'}
        ,{name: '쥬네', age: 40, gender: 'woman'}
    ]
)

import {reactive} from 'vue';
import TestChild from './components/TestChild.vue';

const name = ref('');

const data = reactive(
    ['그로밋', '몸무', '쥬네']
);

// push('경로') : 새로운 URL을 히스토리 스택에 추가하고 해당 URL로 이동
router.push('/your-route-path');

// replace('경로') : URL을 히스토리 스택에 추가하지 않고, 해당 URL로 이동
router.replace('/your-route-path');

router.back();
router.forward();

router.go(1);
router.go(-1);







</script>
<style>
</style>